<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\{Produit, Paiement, Commande, HeureLivraisons, Coupon, Notif, Detail_produit};
use App\Models\Promotion;
use App\Models\User;
use Session;
use Carbon\Carbon;

// Use Carbon;
use Illuminate\paginate;
// use Illuminate\pa
use Illuminate\Http\Request;

class GetController extends Controller
{
    //


    public function home()
    {
        // $promotions = Promotion::orderBy('id', 'desc')->get();
        // $promotions = Promotion::get();
        $promotions = Promotion::where('date_fin', '>=', now())->get();
        // dd($promotions);

        $categories = Categorie::orderBy('id', 'desc')->get();
        return view('welcome', compact('promotions', 'categories'));
    }

    public function facture()
    {
        return view('testFacture');
    }

    public function produits()
    {
        $produits = Produit::orderBy('id', 'desc')->get();
        $categories = Categorie::orderBy('id', 'desc')->get();

        $produits = $produits->map(function ($produit) {
            // Ajouter une propriété calculée pour vérifier la promotion
            $produit->showPromotionButton = $produit->prix === $produit->prixPromotion;


            return $produit;
        });
        $produits = $produits->map(function ($produit) {
            // Ajouter une propriété calculée pour vérifier la promotion

            $produit->checkPromotion = $produit->prix != $produit->prixPromotion;
            return $produit;
        });
        $cart = Session::get('cart', []);
        return view('produits', compact('produits', 'categories', 'cart'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function inscription()
    {
        return view('inscription');
    }

    public function connexion()
    {
        return view('connexion');
    }
    public function checkout(Request $request)
    {
        // dd($request->input('final-price'));
        $heures = HeureLivraisons::get();
        $user = auth()->user();


        // dd($user);

        $prix = $request->input('final-price');
        // dd($prix);




        $cart = Session::get('cart');
        // dd($cart);

        $message = null;
        if ($user === null) {
            $coupons = 0;
        } else {

            $coupons = Coupon::where('date_expiration', '>', now())->where('utilise', false)->where('user_id', $user->id)->get();
            if (!$coupons->isEmpty()) {
                $message = 'Votre montant total sera reduit de 5% car vous possédé une coupon';
            }
        }



        // dd(count($coupons));





        // if (!$coupons->isEmpty()) {
        //     $coupon = $coupons->first();

        //     $tauxReduction = $coupon->reduction;
        // }



        return view("checkout", compact('heures', 'message', 'user'));
    }

    // public function addPanier($id) {
    //     $produits = Produit::orderBy('id', 'desc')->get();
    //     $categories = Categorie::orderBy('id', 'desc')->get();
    //     $item = Produit::where('id', $id)->first();

    //     if(!Session::has('cart')) {
    //         Session::put('cart', []);

    //     }

    //     $cart = Session::get('cart');
    //     if(!in_array($item, $cart)) {
    //         $cart[] = $item;
    //         Session::put('cart', $cart);
    //     }

    //     $produits = $produits->map(function ($produit) {
    //         // Ajouter une propriété calculée pour vérifier la promotion
    //         $produit->showPromotionButton = $produit->prix === $produit->prixPromotion ;


    //         return $produit;
    //     });
    //     $produits = $produits->map(function ($produit) {
    //         // Ajouter une propriété calculée pour vérifier la promotion

    //         $produit->checkPromotion = $produit->prix != $produit->prixPromotion;
    //         return $produit;
    //     });
    //     // return response()->json(['message' => 'Article ajouté au panier !']);
    //     return view('produits', compact('produits', 'categories'));
    // }

    //utiliser ajax sur addPanier
    // public function addPanier($id) {
    //     $produits = Produit::orderBy('id', 'desc')->get();
    //     $item = Produit::where('id', $id)->first();

    //     if (!Session::has('cart')) {
    //         Session::put('cart', []);
    //     }

    //     $cart = Session::get('cart');
    //     if (!in_array($item->id, array_column($cart, 'id'))) {
    //         $cart[] = $item;
    //         Session::put('cart', $cart);
    //     }

    //     $cartCount = count(Session::get('cart'));

    //     $cartItems = Session::get('cart')->map(function($item) {
    //         return [
    //             'id' => $item->id,
    //             'nom' => $item->nom,
    //             'prixPromotion' => $item->prixPromotion,
    //             'imageUrl' => asset('storage/imageProduit/'.$item->image),
    //             'deleteUrl' => url('deletePanier/' .$item->id),
    //         ];
    //     });

    //     return response()->json([
    //         // 'message' => 'Article ajouté au panier !',
    //         'cartCount' => $cartCount,
    //         'cartItems' => $cartItems
    //     ]);
    // }
    // public function addPanier(Request $request, $id) {
    //     $item = Produit::find($id);

    //     if (!$item) {
    //         return response()->json(['error' => 'Produit non trouvé'], 404);
    //     }

    //     // Vérifier si le panier existe dans la session
    //     if (!Session::has('cart')) {
    //         Session::put('cart', []);
    //     }

    //     $cart = Session::get('cart');

    //     // Vérifier si l'article est déjà dans le panier
    //     $found = false;
    //     foreach ($cart as $cartItem) {
    //         if ($cartItem['id'] == $item->id) {
    //             $found = true;
    //             break;
    //         }
    //     }

    //     if (!$found) {
    //         $cart[] = [
    //             'id' => $item->id,
    //             'nom' => $item->nom,
    //             'prixPromotion' => $item->prixPromotion,
    //             'image' => $item->image,
    //         ];
    //         Session::put('cart', $cart);
    //     }

    //     $cartCount = count(Session::get('cart'));

    //     $cartItems = array_map(function($item) {
    //         return [
    //             'id' => $item['id'],
    //             'nom' => $item['nom'],
    //             'prixPromotion' => $item['prixPromotion'],
    //             'imageUrl' => asset('storage/imageProduit/'.$item['image']),
    //             'deleteUrl' => url('deletePanier/' .$item['id']),
    //         ];
    //     }, Session::get('cart'));

    //     return response()->json([
    //         'cartCount' => $cartCount,
    //         'cartItems' => $cartItems
    //     ]);
    // }

    public function addPanier(Request $request, $id)
    {
        $item = Produit::find($id);

        if (!$item) {
            return response()->json(['error' => 'Produit non trouvé'], 404);
        }

        // Vérifier si le panier existe dans la session
        if (!Session::has('cart')) {
            Session::put('cart', []);
        }

        $cart = Session::get('cart');
        $quantite = $request->input('quantite', 1); // Quantité envoyée par la requête ou 1 par défaut

        // Vérifier si l'article est déjà dans le panier
        $found = false;
        foreach ($cart as $cartItem) {
            if ($cartItem['id'] == $item->id) {
                $cartItem['quantite'] += $quantite;
                $found = true;
                break;
            }
        }

        // Ajouter l'article au panier s'il n'est pas déjà présent
        if (!$found) {
            $cart[] = [
                'id' => $item->id,
                'nom' => $item->nom,
                'prixPromotion' => $item->prixPromotion,
                'image' => $item->image,
                'quantite' => $quantite
            ];
            Session::put('cart', $cart);
        }

        // Mettre à jour la session
        Session::put('cart', $cart);

        $cartCount = count(Session::get('cart'));

        $cartItems = array_map(function ($item) {
            return [
                'id' => $item['id'],
                'nom' => $item['nom'],
                'prixPromotion' => $item['prixPromotion'],
                'imageUrl' => $item['image'],
                'deleteUrl' => $item['id'],
                'quantite' => $item['quantite']
            ];
        }, Session::get('cart'));

        return response()->json([
            'cartCount' => $cartCount,
            'cartItems' => $cartItems
        ]);
    }

    public function deletePanier($id)
    {
        $item = Produit::findOrFail($id);
        // dd($item);
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            // dd($cart);


            $cart = array_filter($cart, function ($item) use ($id) {
                return $item['id'] != $id;
            });

            $cart = array_values($cart);

            Session::put('cart', $cart);
        }

        $cartItems = array_map(function ($item) {
            return [
                'id' => $item['id'],
                'nom' => $item['nom'],
                'prix' => $item['prixPromotion'],
                'imageUrl' => $item['image'],
                'deleteUrl' => $item['id'],
            ];
        }, Session::get('cart'));
        $cartCount = count(Session::get('cart'));
        return response()->json([
            'cartCount' =>  $cartCount,
            'cartItems' => $cartItems,
        ]);
    }











    //Admin

    public function dashboard()
    {
        $user = User::where('statut', 'admin')->get();
        $totalUser = User::where('statut', 'user')->count();
        $totalAdmin = User::where('statut', 'admin')->count();
        $totalProduit = Produit::count();


        $admin = auth()->user();
        $notifications = Notif::where('id_receve', $admin->id)->where('is_read', false)->orderBy('id', 'desc')->take(3)->get();
        Carbon::setLocale('fr');
        // dd($notifications);

        foreach ($notifications as $notification) {
            $notification->time_ago = Carbon::parse($notification->created_at)->diffForHumans();
        }








        // dd($user);
        return view('Admin.dashboard', compact('user', 'totalUser', 'totalProduit', 'totalAdmin', 'notifications'));
    }

    public function fiche()
    {
        $entres = Produit::get();
        $produits = Produit::all();

        $sortis = Commande::get();

        // dd($sortis);






        // $id = json_decode($sortis->ids, true);
        // dd($id);
        return view('Admin.fiche', compact('entres', 'produits', 'sortis'));
    }
    public function payement()
    {
        return view('Admin.payement');
    }

    public function showCommandeAdmin()
    {
        Carbon::setLocale('fr');

        $date = Commande::all();

        foreach ($date as $time) {
            $date_livraison = Carbon::parse($time->date_de_livraison)->translatedFormat('d F Y');

            // dd($date_livraison);

        }
        // dd($date);
        $commandes = Commande::orderBy('date_de_livraison', 'Asc')->paginate(4);
        return view('Admin.commande', compact('commandes'));
    }
    public function ajoutProduit()
    {
        $categories = Categorie::orderBy('id', 'desc')->get();
        return view('Admin.ajout', compact('categories'));
    }
    public function ajoutCategorie()
    {
        $categories = Categorie::orderBy('id', 'desc')->get();
        return view("Admin.ajoutCategorie", compact('categories'));
    }
    public function notificationAdmin()
    {
        $admin = auth()->user();
        $notifications = Notif::where('id_receve', $admin->id)->where('is_read', false)->orderBy('id', 'desc')->get();
        Carbon::setLocale('fr');

        foreach ($notifications as $notification) {
            $notification->time_ago = Carbon::parse($notification->created_at)->diffForHumans();
        }

        // $user =   $notifications->user_id;

        return view('Admin.notificationAdmin', compact('notifications'));
    }

    //a refaire
    public function lesProduits()
    {
        // $produits = Produit::orderBy('id', 'desc')->get();
        $categories = Categorie::orderBy('id', 'desc')->get();
        $promotions = Promotion::get();

        $produits = Produit::with('promotion')->orderBy('id', 'desc')->paginate(4);
        $alertP = Produit::where('quantite', '<', 2)->get();

        $quantites = [];

        foreach ($alertP as $quantite) {
            $qantites[] = $quantite->quantite;
        }


        // $dateFin = Promotion::first()->date_fin;
        // dd($dateFin);

        // $produits = $produits->map(function ($produit) {
        //     // Ajouter une propriété calculée pour vérifier la promotion
        //     $produit->showPromotionButton = $produit->prix === $produit->prixPromotion ;


        //     return $produit;
        // });
        // $produits = $produits->map(function ($produit) {
        //     // Ajouter une propriété calculée pour vérifier la promotion

        //     $produit->checkPromotion = $produit->prix != $produit->prixPromotion;
        //     return $produit;
        // });

        // Ajouter des propriétés calculées pour vérifier la promotion directement sur les objets paginés
        $produits->getCollection()->transform(function ($produit) {
            $produit->showPromotionButton = $produit->prix === $produit->prixPromotion;
            $produit->checkPromotion = $produit->prix != $produit->prixPromotion;
            return $produit;
        });




        $StockBas = Produit::get();





        return view('Admin.lesProduits', compact('produits', 'categories', 'promotions', 'alertP', 'quantites'));
    }

    public function utilisateur()
    {
        $users = User::get();

        return view('Admin.utilisateurs', compact('users'));
    }

    public function ajoutHeure()
    {
        return view('Admin.ajoutHeurre');
    }

    public function modification($id)
    {
        $produit = Produit::findOrFail($id);
        $categories = Categorie::get();

        // $finPromotion = null;

        $promotionExiste = Promotion::where('id_produit', $id)->Exists();

        if ($promotionExiste) {
            $promotion = Promotion::where('id_produit', $id)->first();


            $idPromotion = $promotion->id;
            $finPromotion = $promotion->date_fin;
            // dd($finPromotion);
            $promotion = Promotion::FindOrFail($idPromotion);
            $produit->checkPromotion = $produit->prix != $produit->prixPromotion;
            $produit->showPromotionButton = $produit->prix === $produit->prixPromotion;
            // view('Admin.modifPost', compact('promotion')) ;
        }




        // $promotion = Promotion::get();
        // dd($promotion);


        // dd($produit);
        return view('Admin.modifPost', compact('produit', 'categories'));
    }

    public function promotion($id)
    {
        $produit = Produit::findOrFail($id);

        // $promotions = Promotion::get();
        // dd($promotions);
        // $dateFin =  $promotions->date_fin;
        // dd($dateFin);
        return view('Admin.promotion', compact('produit'));
    }

    public function detail($id)
    {
        try {

            $produit = Produit::find($id);
            $detail_produit = Detail_produit::where('id_produit', $id)->first();
            // dd($detail_produit);
            // dd($produit);

            $detail = [];

            $detail[] = [
                // 'image' => $produit->image,
                'image' => asset('storage/imageProduit/' . $produit->image),
                'nom' => $produit->nom,
                'description' => $detail_produit->description,
                'composant' => $detail_produit->composant,
                'date_creation' => $detail_produit->date_creation
            ];

            // dd($detail);

            return response()->json([
                'detail' => $detail,

            ]);
        } catch (\Exception $e) {
            // En cas d'erreur, renvoie une réponse JSON avec un message d'erreur
            return response()->json([
                'error' => 'Produit non trouvé ou une erreur est survenue.',
                'message' => $e->getMessage()
            ], 500);
        }

        // return view('produits');





    }


    // dashboard Use





}
