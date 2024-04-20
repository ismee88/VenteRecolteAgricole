<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'methode_de_livraison',
        'delai_de_livraison',
        'frais_de_livraison',
        'statut',
    ];
}
