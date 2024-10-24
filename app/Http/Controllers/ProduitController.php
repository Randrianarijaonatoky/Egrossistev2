<?php

namespace App\Http\Controllers;

use App\Models\{Categorie,Produit, Promotion, Detail_produit};

use Illuminate\Support\Facades\DB;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    //
    public function addProduit(Request $request){
        // dd('desf');
        $this->validate($request, [
            'nomP'=> 'required',
            'categorie' => 'required',
            'image' => "required | mimes:jpg,png,gif,jfif",
            'prix' => 'required',
            'Quantité' => 'required',
            'description' => 'required ',
            'conposons' => 'required',
            'date_creation' => 'required'

        ]);

        // dd($request->all());








        // $produit = new Produit();
        // $detail = new DetailsProduit;

        // $produit->nom = $request->input("nomP");
        // $produit->categorie = $request->input("categorie");
        // $produit->quantite = $request->input("Quantité");
        // $produit->prix = $request->input("prix");
        // $produit->prixPromotion = $request->input("prix");
        // $produit->image = $imagename;


        // $detail->description = $request->input('description');
        // $detail->coposons = $request->input('conposons');
        // $detail->date_creation = $request->input('date_creation');

        // $produit->save();
        // $detail->save();
        DB::transaction(function () use ($request) {
            if($request->hasFile("image")){
                $image = $request->file("image");
                $imagename = time().'.'.$image->getClientOriginalExtension();

                $image->storeAs('imageProduit',$imagename,"public");
                // storeage/public/imageUser/02022024.jpg
            }
            // Créer le produit
            $produit = Produit::create([
                'nom' => $request->input("nomP"),
                'quantite' => $request->input("Quantité"),
                'prix' => $request->input("prix"),
                'categorie' => $request->input("categorie"),
                "prixPromotion" => $request->input('prix'),
                'image' => $imagename
                // 'image' => $request->file('image')->storeAs('imageProduit', time() . '.' . $request->file('image')->getClientOriginalExtension(), 'public')

            ]);

            // Créer le détail du produit avec l'ID du produit créé
            Detail_produit::create([
                // 'composant' => $request->input('conposons'),
                // 'description' => $request->input('description'),
                // 'date_creation' => $request->input('date_creation'),
                // 'id_produit' => $produit->id,
                'id_produit' => $produit->id,
                'composant' => $request->conposons,
                'description' => $request->description,
                'date_creation' => $request->date_creation,
            ]);
        });

        // dd($produit);
        return back()->with('success', 'votre produit a été ajouté ');
    }

    public function addCategorie(Request $request){
        $this->validate($request, [
            'categorie' => 'required',
            'imageCategorie' => 'required|mimes:png,jpg,jfif,gif,jpeg'
        ]);

        $categorieName = $request->input('categorie');

        if($request->hasFile('imageCategorie')) {
            $image = $request->file('imageCategorie');
            // dd($image);
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $image->storeAs('imageCategorie', $imagename , 'public');
        }



        //verifier  si la catégorie existe déjà

        $categorieExist = Categorie::where('categorie', $categorieName)->exists();

        if($categorieExist) {
            return back()->with('error', 'votre catégorie existe dejà');
        }else{

            $categorie = new Categorie();
            $categorie->categorie = $request->input('categorie');
            $categorie->imageCategorie = $imagename;
            $categorie->save();

        }
        return back()->with('success', 'Votre categorie à été ajoute');
    }


    //delete categorie et produit
    // public function deleteCategorie($id) {
    //     //obtenir le categorie qui a le id
    //     $categorie = Categorie::findOrFail($id);
    //     $ctgProduct = Produit::get();

    //     dd($ctgProduct);


    //     // $categorie->delete();

    //     return redirect()->route('ajoutCategorie')->with('success', 'votre categorie à été bien effacer');

    // }

    public function deleteCategorie($id) {
        // Trouver la catégorie par son ID
        $categorie = Categorie::findOrFail($id);

        $ctg = Categorie::findOrFail($id)->categorie;
        // dd($ctg);

        // Vérifier si la catégorie est associée à des produits
        $categorieAssociée = Produit::where('categorie', $ctg)->exists();

        if ($categorieAssociée) {
            // La catégorie est associée à des produits, ne pas la supprimer
            return redirect()->route('ajoutCategorie')->with('error', 'Impossible de supprimer la catégorie car elle est associée à des produits.');
        } else {
            // La catégorie n'est pas associée à des produits, la supprimer
            $categorie->delete();

            return back()->with('success', 'Votre catégorie a été bien supprimée.');
        }
    }

    public function deleteProduit($id){
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return back()->with('success', 'votre produit à été bien effacer');
    }

    public function deletePromotion($id) {




        // $promotion = Promotion::findOrFail($id);
        $prom = Promotion::where('id_produit', $id);

        $produitPrix = Produit::findOrfail($id)->prix;
        $produit = Produit::findOrFail($id);
        $produit->update([
            'prixPromotion' => $produitPrix,

        ]);





        // dd($promotion);
        // dd($prom);

        $prom->delete();

        return back()->with('success', 'le promotion à été retiré');
    }




    public function update(Request $request, $id)
    {
        $request->validate([
            'modifNom' => 'required|string|max:255',
            'modifPrix' => 'required',
            'modifQuantité' => 'required|integer',
            'modifCategorie' => 'required',
            'modifImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif|max:2048', // Validation pour l'image
            'modif_dateFin' => 'nullable|date',
            'modifPrixProm' =>'nullable'
        ]);

        $product = Produit::findOrFail($id);



        $promotion = Promotion::where('id_produit' , $id)->first();
        // dd($promotion);
        // dd($product);

        // Conserver l'image actuelle si aucune nouvelle image n'est téléchargée
        $imagename = $product->image;

        if ($request->hasFile('modifImage')) {
            // Supprimer l'ancienne image du stockage si elle existe
            if ($imagename) {
                Storage::delete($imagename);
            }

            $image = $request->file("modifImage");
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $image->storeAs('imageProduit',$imagename,"public");

            // Télécharger la nouvelle image
            // $imagePath = $request->file('image')->store('images', 'public');
        }


        $product->update([
            'nom' => $request->input('modifNom'),
            'prix' => $request->input('modifPrix'),

            'quantite' => $request->input('modifQuantité'),

            'categorie' => $request->input('modifCategorie'),
            'image' => $imagename,
        ]);

        if($promotion) {

            $promotion->update([
                'newPrix' => $request->input('modifPrixProm'),
                'date_fin' => $request->input('modif_dateFin')
            ]);

            $product->update([
                'prixPromotion' => $request->input('modifPrixProm'),
            ]);
        }











        return redirect()->route('lesProduits')->with('success', 'Produit mis à jour avec succès.' );
    }




    public function addPromotion(Request $req){

        $this->validate($req, [
            "nomPromotion" => 'required',
            "prixOld" =>'required',
            "prixPromotion" =>'required',
            'idProduit' => 'required',
            'imgProduit' => 'required',
            'finPromotion' => 'required'

        ]);

        $nomProduit = $req->input('nomPromotion');

        $promotionExiste = Promotion::where('nom', $nomProduit)->exists();

        if($promotionExiste){
            return back()->with('error', 'cette produit est déjà en promotion, si vous souhaite le modifier aller dans la page de modification');

        }else{

            $promotion = new Promotion;

            $promotion->nom = $req->input('nomPromotion');
            $promotion->oldPrix = $req->input('prixOld');
            $promotion->newPrix = $req->input('prixPromotion');
            $promotion->id_produit = $req->input('idProduit');
            $promotion->date_fin = $req->input('finPromotion');
            $promotion->image = $req->input('imgProduit');

            $produit = Produit::findOrFail($req->input('idProduit'));

            $produit->update([
                // 'prix' => $req->input('prixPromotion'),
                'prixPromotion' => $req->input('prixPromotion'),
            ]);

            $promotion->save();
            return redirect()->route('lesProduits')->with('success', 'votre promotion à été ajouter');
        }

        // if(!Session::has('promotion')) {
        //     Session::put('promotion', []);
        // }









        // dd($idProduit);


    }

    // Méthode pour gérer les promotions
    public function updatePromotion() {

        // Obtenir la date actuelle
        $today = Carbon::today();


        // Appeler la méthode pour supprimer les promotions expirées
        // Promotion::deleteExpiredPromotions();

        // Trouver et supprimer les promotions expirées
        Promotion::whereDate('date_fin', $today)->delete();

        return response()->json(['message' => 'Expired promotions have been deleted.']);

        // Autres logiques ici, comme rediriger ou retourner une vue
        // return redirect()->back()->with('status', 'Promotions expirées supprimées.');



    }

}
