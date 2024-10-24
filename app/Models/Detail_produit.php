<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'id_produit',
        'composant',
        'date_creation'
    ];
}

