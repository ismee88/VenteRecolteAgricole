<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'produit_id',
        'rate',
        'review',
        'raison',
        'statut',
    ];
}
