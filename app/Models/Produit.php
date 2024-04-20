<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'slug',
        'resume',
        'description',
        'stock',
        'cat_id',
        'photo',
        'prix',
        'offre_prix',
        'reduction',
        'poids',
        'condition',
        'vendeur_id',
        'statut',
        'return_cancellation',
    ];

    public function marque(){
        return $this->belongsTo('App\Models\Marque');
    }

    public function rel_prods(){
        return $this->hasMany('App\Models\Produit', 'cat_id','cat_id')->where('statut','active')->limit(10);
    }

    public static function getProductByCart($id){
        return self::where('id',$id)->get()->toArray();
    }

    public function commandes(){
        return $this->belongsToMany(Commande::class,'commande_produits')->withPivot('quantite','envoye_a_entrepot');
    }

    public function vendeur()
    {
        return $this->belongsTo(Vendeur::class);
    }
}
