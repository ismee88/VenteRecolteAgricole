<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'slug',
        'resume',
        'photo',
        'statut'
    ];

    // public static function shiftChild($cat_id){
    //     return Categorie::whereIn('id', $cat_id)->update(['is_parent'=>1]);
    // }

    public static function getChildByParentID($id){
        return Categorie::where('parent_id',$id)->pluck('titre','id');
    }

    public function produits(){
        return $this->hasMany('App\Models\Produit', 'cat_id', 'id')->where('statut','active');
    }
}
