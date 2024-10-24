<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeureLivraisons;

class HeureLivraisonController extends Controller
{
    //

    // public function addTime(Request $request) {
    //     // dd('hello');

    //     // dd($request->all());
    //     $request->merge(['heure' => trim($request->heure)]); // Supprimer les espaces
    //     $request->validate([
    //         'heure' =>  'required | date_format: H:i '
    //     ]);





    //     // HeureLivraisons::create($request->all());
    //     $heure = new HeureLivraisons();
    //     $heure->heurre = $request->heure;

    //     return back()->with('success', 'votre heure de livraison est ajouté');




    // }

    public function showHeure(){

        $heures = HeureLivraisons::get();
        return view('Admin.ajoutHeurre', compact('heures'));
    }

    public function addTime(Request $request) {
        // Affichez ce qui est envoyé avant la validation
        logger()->info('Valeur envoyée pour heure:', ['heure' => $request->heure]);

        $request->merge(['heure' => trim($request->heure)]); // Supprimer les espaces

        // Vérifiez si le format est bien celui attendu
        $request->validate([
            'heure' => 'required|date_format:H:i'
        ]);

        // HeureLivraisons::create($request->all());
        $heure = new HeureLivraisons();

        $heure->heurre = $request->heure;

        $heure->save();

        return back()->with('success', 'Votre heure de livraison a été ajoutée');
    }

    public function deleteHeure($id) {
        $heure = HeureLivraisons::findOrFail($id);

        // dd($heure);

        $heure->delete();
        return back()->with('succes', 'l\heure à été suprimer');
    }


}
