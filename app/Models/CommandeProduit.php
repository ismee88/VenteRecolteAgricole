<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeProduit extends Model
{
    use HasFactory;

    protected $fillable = [
        'commande_id',
        'produict_id',
        'quantite',
        'vendeur_id',
        'envoye_a_entrepot',
    ];
}
