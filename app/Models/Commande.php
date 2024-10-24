<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'quantite',
        'prix',
        'image',
        'user_id',
        'prenom',
        'contact',
        'date_livraison',
        'frais',
        'adress',
        'heure',
        'id_produit',
        'nom_produits',
        'prix_avec_frais',
        'montant_a_paye',
        'statut_paiement'

    ];

}
