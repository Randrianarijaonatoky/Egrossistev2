<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Notification;
use App\Models\{Commande, HeureLivraisons, User, Notif};
use Illuminate\Http\Request;
use Session;

class CommandeController extends Controller
{
    //


    public function showCommande()
    {

        $heures = HeureLivraisons::get();
        // dd($heures);
        return view('commande', compact('heures'));
    }

    public function addcommande(Request $request)
    {
        $request->validate([
            "prenom" => "required",
            "nom" => "required",
            "adresse" => "required",
            "contact" => "required",
            "frais" => "required",
            'date_livraison' => 'required',
            'heure' => 'required',

        ]);

        if ($request->input('frais') === 3000) {
            $locatlisation = 'Centre ville';
        } else {
            $localisation = 'en dehors du ville ';
        }

        $user = auth()->user();


        $panier = json_decode($request->input('commande'), true);
        foreach ($panier as $produit) {
            // dd($produit['image']);

            $commande = new Commande();

            $commande->nom = $request->input('nom');
            $commande->prenom = $request->input('prenom');
            $commande->lieu = $request->input('adresse');
            $commande->contact = $request->input('contact');
            $commande->date_de_livraison = $request->input('date_livraison');
            $commande->frais_de_livraison = $request->input('frais');
            $commande->contact = $request->input('contact');
            $commande->heurre = $request->input('heure');
            $commande->statut = 'en a tente';
            $commande->montant_a_paye = $request->input('final_prix');
            $commande->user_id = $user->id;

            $commande->id_produit = $produit['id'];
            $commande->nom_produits = $produit['nom'];
            $commande->quantite = $produit['quantite'];
            $commande->image = $produit['image'];
            $commande->prix = $produit['prix'];
            $commande->statut_paiement = 'au moment du livriason';
            $commande->localisation = $localisation;

            $commande->save();
        }


        $cart = Session::get('cart');

        // dd($cart);

        // $id_produits = [];
        // $nom_produits = [] ;
        // $prix_produits = [] ;
        // $image_produits = [] ;

        // foreach($cart as $item) {
        //     $id_produits [] = $item['id'];
        //     $nom_produits [] = $item['nom'];
        //     $prix_produits [] = $item['prixPromotion'];
        //     $image_produits [] = $item['image'];
        // };




        // $commande->id_produit = json_encode($id_produits);
        // $commande->nom_produits = json_encode($nom_produits);
        // $commande->prix = json_encode($prix_produits);
        // $commande->image = json_encode($image_produits);
        // $commande->quantite = count($cart);
        // $commande->statut = 'non livré';
        // $commande->montant_a_paye = "auccun";

        // $commande->save();

        Session::forget('cart');




        return redirect()->route('commandeUser')->with('success', 'votre comande à étee envoyer');
    }

    public function annulationCommande($id)
    {
        $commande = Commande::findOrFail($id);
        // dd($commande);

        $user = auth()->user();


        $admin = User::where('statut', 'admin')->first();
        // dd($admin->id);

        $notification = [
            'type' => 'Demmande d\'annulation commande',
            'data' => json_encode([
                'id_commande' => $commande->id,
                'id_produit' => $commande->id_produit,
                'nom_produit' =>  $commande->nom_produits,
                'quantite' => $commande->quantite,
                'prix' => $commande->prix,
                'image' => $commande->image,
                'date_de_livraison' => $commande->date_de_livraison,
                'statut' => $commande->statut,
                'lieu' => $commande->lieu,
                'heure' => $commande->heure,

                'nom' => $commande->nom,
                'prenom' => $commande->prenom,
                'contact' => $commande->contact

            ]),
        ];

        Notif::create([
            'id_receve' => $admin->id,
            'user_id' => $user->id,
            'type' => $notification['type'],
            'data' => $notification['data']

        ]);

        // Vérifie si c'est une requête AJAX
        if (request()->ajax()) {
            return response()->json(['success' => 'Demande d\'annulation envoyée atender que l\'administrateur confrimer.']);
        }

        // return redirect()->back()->with('success', 'Demande d\'annulation envoyée atender que l\'administrateur confrime.');
    }


    public function validerAnnulation($id)
    {
        $notification = Notif::findOrFail($id);
        $user_receve = $notification->user_id;
        $data = json_decode($notification->data, true);

        $admin = auth()->user();
        // dd($admin->id);

        // Annuler la commande
        $commande = Commande::find($data['id_commande']);


        // Marquer la notification comme lue
        $notification->is_read = true;
        $notification->save();

        $motif = [
            'type' => 'Votre demmande d\'annulation commande à été valider par administrateur',
            'data' => json_encode([
                'id_commande' => $commande->id,
                'id_produit' => $commande->id_produit,
                'nom_produit' =>  $commande->nom_produits,
                'quantite' => $commande->quantite,
                'prix' => $commande->prix,
                'image' => $commande->image,
                'date_de_livraison' => $commande->date_de_livraison,
                'statut' => $commande->statut,
                'lieu' => $commande->lieu,
                'heure' => $commande->heure,

                'nom' => $commande->nom,
                'prenom' => $commande->prenom,
                'contact' => $commande->contact

            ]),
        ];


        Notif::create([
            'id_receve' => $user_receve,
            'user_id' => $admin->id,
            'type' => $motif['type'],
            'data' => $motif['data']



        ]);
        $commande->delete(); // ou $commande->update(['status' => 'annulée']);

        return redirect()->back()->with('success', 'Confirmartion d\'annulation de la commande avec succès.');
    }

    public function refuserAnnulation($id)
    {
        $notification = Notif::findOrFail($id);
        $user_receve = $notification->user_id;
        $data = json_decode($notification->data, true);
        // dd($data);

        $admin = auth()->user()->id;

        $commande = Commande::find($data['id_commande']);

        $motif = [
            'type' => 'votre demmande sur l\'annulation de commande a été refuse',
            'data' => json_encode([
                'id_commande' => $commande->id,
                'id_produit' => $commande->id_produit,
                'nom_produit' =>  $commande->nom_produits,
                'quantite' => $commande->quantite,
                'prix' => $commande->prix,
                'image' => $commande->image,
                'date_de_livraison' => $commande->date_de_livraison,
                'statut' => $commande->statut,
                'lieu' => $commande->lieu,
                'heure' => $commande->heure,

                'nom' => $commande->nom,
                'prenom' => $commande->prenom,
                'contact' => $commande->contact
            ]),

        ];
        Notif::created([
            'id_receve' => $user_receve,
            "user_id" => $admin,
            'type' => $motif['type'],
            'data' => $motif['data'],
        ]);

        $notification->is_read = true;
        $notification->save();

        return back()->with('success', 'L\'utilisateur vas recevoire que son demmande d\'annulation commande a été refuser');
    }
}
