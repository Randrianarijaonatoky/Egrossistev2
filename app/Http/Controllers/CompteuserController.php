<?php

namespace App\Http\Controllers;

use App\Models\{Produit, Paiement, Commande, Coupon, Notif};
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CompteuserController extends Controller
{
    //

    // public function dashboardUser() {
    //     $id_user = auth()->user()->id;
    //     // dd($id_user);
    //     $commandes = Commande::where('user_id', $id_user)->get();
    //     // dd($commandes);

    //     $countCommande = Commande::get()->count();
    //     // dd($countPaiement);

    //     $paiements = Paiement::get();
    //     $produits = [];


    //     foreach($commandes as $achat){
    //         $idP = json_decode($achat->id_produit, true);

    //         $nomProduit = json_decode($achat->nom, true);
    //         $quantite = $achat->quanite;
    //         $prixProduit = json_decode($achat->prix, true);
    //         $imagesProduit = json_decode($achat->image, true);

    //         // dd($nomProduit);
    //     }
    //     foreach($nomProduit as $index => $nom) {
    //         $prix = $prixProduit[$index] ?? 0 ;
    //         $image = $imagesProduit[$index] ?? 0 ;

    //         $produits [] = [
    //             'nom' => $nom,
    //             'quantite' => $quantite,
    //             'prix' => $prix,
    //             'image' => $image
    //         ];
    //     }








    //     // $countProduit = strlen($produits);
    //     // dd($countProduit);
    //     // dd($produits);
    //     return view('user.userCompte', compact('commandes', 'countCommande','paiements'),  ['produits' => $produits] );
    // }

    public function dashboardUser()
    {
        Carbon::setLocale('fr');
        $id_user = auth()->user()->id;

        // dd($id_user);

        // Récupérer les commandes de l'utilisateur
        $commandes = Commande::where('user_id', $id_user)->orderBy('id', 'desc')->take(4)->get();

        $coupons = Coupon::where('user_id', $id_user)->where('utilise', false)->get();

        $countCoupon = count($coupons);
        $totalAmount = Paiement::where('user_id', $id_user)->sum('amount');

        $user = auth()->user();
        $notifications  = $user->notifications;


        //  dd($commandes);


        $countCommande = $commandes->count(); // Comptage basé uniquement sur les commandes de l'utilisateur

        // $paiements = Paiement::where('user_id', $id_user)->get();
        // dd($paiements);

        $paiements = Paiement::where('user_id', $id_user)->get()->map(function ($paiement) {
            $created_at = Carbon::parse($paiement->created_at);

            if ($created_at->isToday()) {
                $paiement->formatted_date = "Aujourd'hui";
            } elseif ($created_at->isYesterday()) {
                $paiement->formatted_date = "Hier";
            } else {
                $paiement->formatted_date = $created_at->format('d F Y');
            }

            return $paiement;
        });



        // Retourner la vue avec les données
        return view('user.userCompte', compact('commandes', 'countCommande', 'paiements', 'countCoupon', 'totalAmount', 'notifications'));
    }

    public function showCoupons()
    {
        $id_user = auth()->user()->id;
        $coupons = Coupon::where('user_id', $id_user)->where('date_expiration', '>', now())->where('utilise', false)->get();

        return view('user.Coupons', compact('coupons'));
    }


    public function showNotifUser()
    {
        $id_user = auth()->user()->id;
        $notifications = Notif::where('id_receve', $id_user)->orderBy('id', 'desc')->get();
        Carbon::setLocale('fr');
        foreach ($notifications as $notifiaction) {
            $notifiaction->time_ago = Carbon::parse($notifiaction->created_at)->diffForHumans();
        }
        return view('user.notifUser', compact('notifications'));
    }




    public function commandeUser()
    {
        Carbon::setLocale('fr');
        $id_user = auth()->user()->id;

        $now = Carbon::now();
        $dateNow =
            Carbon::parse($now);
        // dd($dateNow);
        // dd($id_user);
        $commandes = Commande::where('user_id', $id_user)->paginate(5);
        // dd($commandes);

        $countCommande = Commande::get()->count();
        // dd($countPaiement);

        foreach ($commandes as $commande) {
            $commande->time_ago = Carbon::parse($commande->created_at)->diffForHumans();


            $dateLivraison = Carbon::parse($commande->date_de_livraison);
            $heureLivraison = Carbon::parse($commande->heurre);
            if ($dateLivraison->isToday()) {
                $commande->formatted_date_livraison = "aujourd'hui";
            } elseif ($dateLivraison->isTomorrow()) {
                $commande->formatted_date_livraison = "demain";
            } else {
                $commande->formatted_date_livraison = $dateLivraison->translatedFormat('j F Y');
            }

            $commande->heure_de_livraison = $heureLivraison->translatedFormat('H:s');
        }

        $paiements = Paiement::get();



        return view('user.commande', compact('commandes', 'countCommande', 'paiements', 'dateNow'));
    }

    public function userModif()
    {
        $user = auth()->user();
        return view('user.userModif', compact('user'));
    }



    public function annulation($id) {}
}
