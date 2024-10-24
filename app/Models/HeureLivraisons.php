<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeureLivraisons extends Model
{
    use HasFactory;

    protected $fillable = [
        "heurre",
    ];
}
