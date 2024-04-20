<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class VendeurController extends Controller
{
    public function dashboard(){
        $commandes = Commande::orderBy('id','DESC')->get();
        return view('vendeur.index',compact('commandes'));
    }
}
