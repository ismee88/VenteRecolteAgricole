<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock',
        'offre_prix',
        'prix',
        'taille',
        'produit_id',
    ];
}
