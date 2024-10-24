<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'promotions';

    protected $fillable = ['id','oldPrix', 'newPrix', 'id_produit', 'creadetAt', 'date_fin','id_produit'];

    // Méthode pour supprimer les promotions expirées
    public static function deleteExpiredPromotions()
    {   
        $today = Carbon::today();
        self::whereDate('date_fin', $today)->delete();
    }

    // Méthode pour supprimer les promotions où date_fin est égale à createdAt
    // public static function deleteExpiredPromotions()
    // {
    //     // Utilisation de la méthode DB pour exécuter la requête SQL
    //     DB::table('promotions')
    //         ->whereColumn('date_fin', 'creadetAt')
    //         ->delete();
    // }
}
