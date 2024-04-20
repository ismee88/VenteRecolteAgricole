<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\CommandeMail;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function checkout1(){
        $user = Auth::user();
        return view('frontend.pages.checkout.checkout1', compact('user'));
    }

    public function checkout1Store(Request $request){
        // return $request->all();
        Session::put('checkout',[
            'nom_complet'=>$request->nom_complet,
            'email'=>$request->email,
            'telephone'=>$request->telephone,
            'pays'=>$request->pays,
            'adresse'=>$request->adresse,
            'ville'=>$request->ville,
            'etat'=>$request->etat,
            'code_postal'=>$request->code_postal,
            'note'=>$request->note,
            'snom_complet'=>$request->snom_complet,
            'semail'=>$request->semail,
            'stelephone'=>$request->stelephone,
            'spays'=>$request->spays,
            'sadresse'=>$request->sadresse,
            'sville'=>$request->sville,
            'setat'=>$request->setat,
            'scode_postal'=>$request->scode_postal,
            'sous_total'=>$request->sous_total,
            'montant_total'=>$request->montant_total,
        ]);

        $shippings = Shipping::where('statut','active')->orderBy('frais_de_livraison','DESC')->get();

        return view('frontend.pages.checkout.checkout2',compact('shippings'));

    }

    public function checkout2Store(Request $request){
        // return $request->all();
        Session::push('checkout',[
            'frais_de_livraison'=>$request->frais_de_livraison,
        ]);
        return  view('frontend.pages.checkout.checkout3');

    }

    public function checkout3Store(Request $request){
        // return $request->all();
        Session::push('checkout',[
            'methode_paiement'=>$request->methode_paiement,
            'statut_paiement'=>'non payé',
        ]);

        // return Session::get('checkout');

        return  view('frontend.pages.checkout.checkout4');
    }

    public function checkoutStore(){
        // return Session::get('checkout');
        $commande = new Commande();
        $commande['user_id']=auth()->user()->id;
        $commande['numero_commande']=Str::upper('ORD-'.Str::random(6));
        // return Session::get('checkout');
        
        $commande['sous_total'] = str_replace(',', '', Session::get('checkout')['sous_total'])+0;
        if(Session::get('coupon')){
            $commande['coupon']=Session::get('coupon')['valeur'];
        }else{
            $commande['coupon'] = 0;
        }
        $commande['montant_total']=str_replace(',', '', Session::get('checkout')['sous_total'])+Session::get('checkout')[0]['frais_de_livraison']-$commande['coupon'];
        $commande['methode_paiement']=Session::get('checkout')[1]['methode_paiement'];
        $commande['statut_paiement']=Session::get('checkout')[1]['statut_paiement'];
        $commande['condition']="en attente";
        $commande['frais_de_livraison']=Session::get('checkout')[0]['frais_de_livraison'];
        $commande['nom_complet']=Session::get('checkout')['nom_complet'];
        $commande['email']=Session::get('checkout')['email'];
        $commande['telephone']=Session::get('checkout')['telephone'];
        $commande['pays']=Session::get('checkout')['pays'];
        $commande['adresse']=Session::get('checkout')['adresse'];
        $commande['ville']=Session::get('checkout')['ville'];
        $commande['etat']=Session::get('checkout')['etat'];
        $commande['code_postal']=Session::get('checkout')['code_postal'];
        $commande['note']=Session::get('checkout')['note'];
        $commande['snom_complet']=Session::get('checkout')['snom_complet'];
        $commande['semail']=Session::get('checkout')['semail'];
        $commande['stelephone']=Session::get('checkout')['stelephone'];
        $commande['spays']=Session::get('checkout')['spays'];
        $commande['sadresse']=Session::get('checkout')['sadresse'];
        $commande['sville']=Session::get('checkout')['sville'];
        $commande['setat']=Session::get('checkout')['setat'];
        $commande['scode_postal']=Session::get('checkout')['scode_postal'];

        Mail::to($commande['email'])->bcc($commande['semail'])->cc('ismaeland91@gmail.com')->send(new CommandeMail($commande));
        // dd('Mail is send');

        // return $commande;

        $statut = $commande->save();

        foreach(Cart::instance('shopping')->content() as $item){
            $produit_id[] = $item->id;
            $produit = Produit::find($item->id);
            $quantite = $item->qty;
            // $vendeur_id[] = $produit->vendeur_id;
            // $commande->produits()->attach($produit,['quantite'=>$quantite]);
            $commande->produits()->attach($produit, ['quantite' => $quantite, 'vendeur_id' => $produit->vendeur_id]);
        }

        if($statut){
            //Mail
            //Mail
            Cart::instance('shopping')->destroy();
            Session::forget('coupon');
            Session::forget('checkout');
            return redirect()->route('complete',$commande['numero_commande']);
        }else{
            return redirect()->route('checkout1')->with('error','Veuillez réessayer !');
        }
    }

    public function complete($commande){
        $commande = $commande;
        return view('frontend.pages.checkout.complet',compact('commande'));
    }
}
