<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        $commandes = Commande::orderBy('id','DESC')->get();
        return view('backend.index',compact('commandes'));
    }
}
