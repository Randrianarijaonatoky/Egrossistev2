<?php

namespace App\Http\Controllers;

use App\Notifications\AchatEffectueNotification;

use App\Models\{Paiement, Commande, Coupon};
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;
// Use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;



use Session;

class StripeController extends Controller
{




    public function payer(Request $req)
    {
        $this->validate($req, [
            "prenom" => "required",
            "nom" => "required",
            "adresse" => "required",
            "contact" => "required",
            "frais" => "required",
            'date_livraison' => 'required',
            'heure' => 'required',



            //element stripe
            "stripeToken" => "required",
            "final-price" => "required"

        ]);

        // dd($req->all());


        $user = auth()->user();

        //Vérification des coupons
        $coupons = Coupon::where('user_id', $user->id)->where('date_expiration', '>', now())->where('utilise', false)->get();

        if (!$coupons->isEmpty()) {
            //utilisation du 1er coupon
            $coupon = $coupons->first();
            $taux_reduction = $coupon->reduction;

            $prixInitial = $req->input('final-price');
            $prixReduit = ($prixInitial * 5) / 100;

            $prixReduction = $prixInitial - $prixReduit;


            $coupon->utilise = true;
            $coupon->save();
        } else {
            $prixReduction  = $req->input('final-price');
        }

        if ($req->input('frais') === 3000) {
            $localisation = 'Centre ville';
        } else {
            $localisation = 'en dehors du ville ';
        }





        // $prix = $req->input("final-price");
        // dd($prix);
        $token = $req->input("stripeToken");

        // if(!Session::has('cart')){
        //     return view('checkout')->with('message','panier vide');
        // }

        // Assumer un taux de change fictif de 1 EUR = 5000 MGA
        $tauxDeChange = 500;
        $prixEuro = $prixReduction / $tauxDeChange;
        // dd($prixEuro);
        $invoiceNumber = rand(0, 1000000);
        // dd($invoiceNumber);

        // dd($noms);




        Stripe::setApiKey('sk_test_51PStORRxV6dbiGjlabSq93siVzdeeVW409Taox2Kn4YhnyhfQSJ7ZuMhySxaQqJxfJcwk2sBBw2OTfrOXN5W7eGb00gAwxXPvL'); //clé privée no atao eto
        try {
            $charge = Charge::create(array(
                "amount" => intval($prixEuro) * 100,
                "currency" => "EUR",
                "source" => $token,
                "description" => "Teste Paiment avec laravel"
            ));

            $check = true;
        } catch (\Exception $e) {
            return redirect()->Route('checkout')->with('error', $e->getMessage());
        }


        //recuperation des produit
        // $produitId = $req->input('produit_id');
        // $quantite = $req->input('quantite', 1);

        $cart =  json_decode($req->input('panier'), true);
        // dd($cart);

        // dd($cart);
        // foreach ($cart as $item) {
        //     dd($item);
        // }





        // $cart = Session::get('cart');

        $ids = [];
        $noms = [];
        $prixs = [];
        $images = [];
        $quantite = [];
        foreach ($cart as $item) {
            $ids[] = $item['id'];
            $noms[] = $item['nom'];
            $prixs[] = $item['prix'];
            $images[] = $item['image'];
            $quantite[] = $item['quantite'];
        }
        $user = auth()->user();
        // dd($user->id);


        if ($check) {

            $paiement = new Paiement();
            $paiement->user_id = $user->id;

            // $paiement->id_produit  = $ids;
            $paiement->id_produit = json_encode($ids); // Stocke les IDs en JSON
            $paiement->nom = json_encode($noms); // Stocke les noms en JSON
            $paiement->quantite = json_encode($quantite); // Remplacez par la quantité réelle si nécessaire
            $paiement->prix = json_encode($prixs);
            $paiement->image = json_encode($images); // Stocke les images en JSON
            $paiement->numero_facture = $invoiceNumber;

            $paiement->stripe_charge_id = $charge->id;
            $paiement->amount = $prixReduction;



            //commandee
            if (!empty($cart)) {
                foreach ($cart as $item) {
                    // dd($item['image']);
                    // Créer une nouvelle entrée pour chaque produit dans le panier
                    $commandes = new Commande;

                    $commandes->id_produit = $item['id'];
                    $commandes->nom_produits = $item['nom'];
                    $commandes->quantite = $item['quantite'];
                    $commandes->prix = $item['prix'];
                    $commandes->image = $item['image'];
                    $commandes->user_id = $user->id;
                    $commandes->nom = $req->input('nom');
                    $commandes->prenom = $req->input('prenom');
                    $commandes->contact = $req->input('contact');
                    $commandes->date_de_livraison = $req->input('date_livraison');
                    $commandes->lieu = $req->input('adresse');
                    $commandes->frais_de_livraison = $req->input('frais');
                    $commandes->localisation = $localisation;
                    $commandes->heurre = $req->input('heure');
                    $prix_avec_frais = $prixReduction + intval($req->input('frais'));

                    $commandes->montant_a_paye = $prix_avec_frais;
                    $commandes->statut = 'en a tente';
                    $commandes->statut_paiement = 'Payer';

                    $commandes->save();
                }
            }

            $paiement->save();

            // $commandes->id_produit = json_encode($ids);
            // $commandes->nom_produits = json_encode($noms);
            // $commandes->quantite = count($cart);
            // $commandes->prix = json_encode($prixs);
            // $commandes->image = json_encode($images);






            //coupon
            $taux_reduction = 5;
            // dd($taux_reduction);
            Coupon::create([
                'user_id' => $user->id,
                'code' => Str::random(10),
                'reduction' => $taux_reduction,
                'date_expiration' => now()->addDays(1), //Expiré après 1j
                'utilise' => false,
            ]);

            $details = [
                "amount" => $prixReduction,
                'invoiceNumber' => $invoiceNumber,
                'date' => now(),
            ];
            $user->notify(new AchatEffectueNotification($details));
        }




        Session::forget('cart');

        // return back()->with('success','Achat effectué avec success!');
        // return redirect('/inovice/' .$paiement->id);
        return redirect()->route('invoice', ['id' => $paiement->id]);
    }

    // public function verifyCoupon() {
    //     $user = auth()->user();
    //     $coupons = $user->coupons()->where('date_expiration', '>', now())->get();

    //     if($coupons->isEmpty()) {
    //         return response()->json(['message', 'auccune coupon disponible ']);
    //     }


    // }


    //telechargement fichier pdf

    // public function generateInvoice($id) {
    //     $paiement = Paiement::findOrFail($id);
    //     // dd($paiement);


    //     $pdf = Pdf::loadView('invoice', ['paiement' => $paiement]);

    //     return $pdf->download('invoice' . $paiement->id . '.pdf');

    // }

    public function showInvoice($id)
    {
        $paiement = Paiement::findOrFail($id);

        // Décoder les données JSON en tableaux PHP
        $idProduit = json_decode($paiement->id_produit, true);
        $nomArray = json_decode($paiement->nom, true);
        $quantiteArray = json_decode($paiement->quantite, true);
        $prixArray = json_decode($paiement->prix, true);
        $imageArray = json_decode($paiement->image, true);

        // Calculer le montant total (assurez-vous que la quantité et le prix sont des entiers ou des nombres à virgule flottante)
        $totalMontant = 0;
        $details = [];
        foreach ($nomArray as $index => $nom) {
            // $quantite = $quantiteArray[$index] ?? 0;
            // $prix = $prixArray[$index] ?? 0;
            $quantite = isset($quantiteArray[$index]) ? (float) $quantiteArray[$index] : 0;
            $prix = isset($prixArray[$index]) ? (float) $prixArray[$index] : 0;
            $total = $quantite * $prix;
            // $totalMontant += $total;

            $details[] = [
                'nom' => $nom,
                'quantite' => $quantite,
                'prix' => $prix,
                'total' => $total,
            ];
        }
        return view('invoice', ['paiement' => $paiement, 'details' => $details]);
    }


    //telechargement du facture


    public function generateInvoice($id)
    {
        $paiement = Paiement::findOrFail($id);

        $id_produits = json_decode($paiement->ids, true);
        $nomArray = json_decode($paiement->nom, true);
        $quantiteArray = json_decode($paiement->quantite, true);
        // $quantiteArray = json_decode($paiement->quantite, true);
        $prixArray = json_decode($paiement->prix, true);
        $imageArray = json_decode($paiement->image, true);

        $details = [];

        foreach ($nomArray as $index => $nom) {
            // $quantite = $quantiteArray[$index] ?? 0;
            // $prix = $prixArray[$index] ?? 0;
            $quantite = isset($quantiteArray[$index]) ? (float) $quantiteArray[$index] : 0;
            $prix = isset($prixArray[$index]) ? (float) $prixArray[$index] : 0;
            $total = $quantite * $prix;

            $details[] = [
                'nom' => $nom,
                'quantite' => $quantite,
                'prix' => $prix,
                'total' => $total,
            ];
        }
        // dd($details);
        // $pdf = PDF::loadView('invoice');
        $pdf = Pdf::loadView('invoice', ['paiement' => $paiement, 'details' => $details])->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->download('invoice-' . $paiement->id . '.pdf');
    }
}
