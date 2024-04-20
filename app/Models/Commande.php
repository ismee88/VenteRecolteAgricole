<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'numero_commande',
        // 'produit_id',
        'sous_total',
        'montant_total',
        'coupon',
        'frais_de_livraison',
        'quantite',
        'nom_complet',
        'email',
        'telephone',
        'pays',
        'ville',
        'adresse',
        'etat',
        'code_postal',
        'note',
        'snom_complet',
        'semail',
        'stelephone',
        'spays',
        'sville',
        'sadresse',
        'setat',
        'scode_postal',
        'methode_paiement',
        'statut_paiement',
        'condition',
    ];

    public function produits(){
        return $this->belongsToMany(Produit::class,'commande_produits')->withPivot('quantite','envoye_a_entrepot');
    }
}
