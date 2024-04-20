<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function wishlist(){
        return view('frontend.pages.wishlist.index');
    }

    public function wishlistStore(Request $request){
        $produit_id = $request->input('produit_id');
        $produit_qte = $request->input('produit_qte');
        $produit = Produit::getProductByCart($produit_id);
        $price = $produit[0]['offre_prix'];
        $wishlist_array = [];
        foreach(Cart::instance('wishlist')->content() as $item){
            $wishlist_array[] = $item->id;
        }
        if(in_array($produit_id,$wishlist_array)){
            $response['present'] = true;
            $response['message'] = "L'article est déjà dans votre liste de souhaits";
        }else{
            $result = Cart::instance('wishlist')->add($produit_id,$produit[0]['titre'], $produit_qte, $price)->associate('App\Models\Produit');
            if($result){
                $response['statut']=true;
                $response['message'] = "L'article a été ajouté dans la liste de souhaits";
                $response['whislist_count']=Cart::instance('wishlist')->count();
            }
        }
        if($request->ajax()){
            $header = view('frontend.layouts.header')->render();
            $response['header']=$header;
        }
        return json_encode($response);
    }

    public function moveToCart(Request $request){
        $item = Cart::instance('wishlist')->get($request->input('rowId'));

        Cart::instance('wishlist')->remove($request->input('rowId'));
        $result = Cart::instance('shopping')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Produit');
        if($result){
            $response['statut']=true;
            $response['message'] = "L'article a été déplacé dans un panier";
            $response['cart_count'] = Cart::instance('shopping')->count();
        }
        if($request->ajax()){
            $wishlist = view('frontend.layouts._wishlist')->render();
            $header = view('frontend.layouts.header')->render();
            $response['wishlist_list']=$wishlist;
            $response['header']=$header;
        }
        return $response;
    }

    public function wishlistDelete(Request $request){
        $id = $request->input('rowId');
        Cart::instance('wishlist')->remove($id);

        $response['statut']=true;
        $response['message'] = "L'article a été enlevé des favoris";
        $response['cart_count'] = Cart::instance('shopping')->count();

        if($request->ajax()){
            $wishlist = view('frontend.layouts._wishlist')->render();
            $header = view('frontend.layouts.header')->render();
            $response['wishlist_list']=$wishlist;
            $response['header']=$header;
        }
        return $response;
    }
}
