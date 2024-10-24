<?php

namespace App\Models;
use App\Models\{Promotion,DetailsProduit};

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    // protected $fillable {
    //     "nom",
    //     ''
    // }
    protected $fillable = [
        'nom',
        'prix',
        'categorie',
        'prix',
        'quantite',
        'prixPromotion',
        'image',
        'descripton'
    ];

    // Dans le modèle Produit
    public function promotion()
    {
        // return $this->belongsTo(Promotion::class); // ou belongsToMany selon votre cas
        return $this->belongsTo(Promotion::class, 'id');
    }
    // Dans le modèle Produit
    public function isOnPromotion()
    {
        // Vérifie si les prix sont différents ou s'il y a une promotion associée
        return $this->prix != $this->prixPromotion || $this->promotion()->exists();
    }

    //Alert de bas de stock
    public function basStock() {
        // $this->qunatite < 3 ;

        return    $this->qunatite < 3 || with('alert', 'Votre produits est présque epuisé');
    }

    public function details()
    {
        return $this->hasOne(DetailsProduit::class, 'id_produit');
    }



    public function imageProduit() {
        return $this->hasOne(ImageProduit::class, 'produit_id');
    }

}
