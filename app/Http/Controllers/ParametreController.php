<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Illuminate\Http\Request;

class ParametreController extends Controller
{
    public function parametre(){
        $parametre = Parametre::first();
        return view('backend.parametre.parametre', compact('parametre'));
    }

    public function parametreUpdate(Request $request){
        $parametre = Parametre::first();
        $statut = $parametre->update([
            'titre'=>$request->titre,
            'meta_description'=>$request->meta_description,
            'meta_keywords'=>$request->meta_keywords,
            'logo'=>$request->logo,
            'favicon'=>$request->favicon,
            'adresse'=>$request->adresse,
            'email'=>$request->email,
            'telephone'=>$request->telephone,
            'fax'=>$request->fax,
            'footer'=>$request->footer,
            'facebook_url'=>$request->facebook_url,
            'twitter_url'=>$request->twitter_url,
            'linkedin_url'=>$request->linkedin_url,
            'pinterest_url'=>$request->pinterest_url,
        ]);
        if($statut){
            return back()->with('success','Paramètres mis à jour avec succès');
        }else{
            return back()->with('error','Quelque chose a mal tourné');
        }
    }
}
