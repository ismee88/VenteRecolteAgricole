<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'statut',
        'valeur'
    ];

    public function discount($total){
        if($this->type == "fixe"){
            return $this->valeur;
        }elseif($this->type == "pourcent"){
            // dd($total);
            return($this->valeur/100)*$total;
        }else{
            return 0;
        }
    }
}
