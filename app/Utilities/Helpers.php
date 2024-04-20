<?php

use App\Models\Produit;

class Helper{
    public static function userDefaultImage(){
        return asset('frontend/img/profil.jpg');
    }

    public static function minPrice(){
        return floor(Produit::min('offre_prix'));
    }

    public static function maxPrice(){
        return floor(Produit::max('offre_prix'));
    }
}

//Parametre seo
if(!function_exists('get_setting')){
    function get_setting($key){
        return \App\Models\Parametre::value($key);
    }
}