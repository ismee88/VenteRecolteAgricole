<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Produit;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function cart(){
        return view('frontend.pages.cart.index');
    }

    public function cartStore(Request $request){
        $produit_qte = $request->input('produit_qte');
        $produit_id = $request->input('produit_id');
        $produit = Produit::getProductByCart($produit_id);
        $prix = $produit[0]['offre_prix'];
        
        $cart_array = [];
        foreach(Cart::instance('shopping')->content() as $item){
            $cart_array[] = $item->id;
        }
        $result = Cart::instance('shopping')->add($produit_id, $produit[0]['titre'],$produit_qte, $prix)->associate('App\Models\Produit');

        if($result){
            $response['statut']=true;
            $response['produit_id']=$produit_id;
            $response['total']=Cart::subtotal();
            $response['cart_count']=Cart::instance('shopping')->count();
            $response['message']="le produit a été ajouté à votre panier";
        }

        if($request->ajax()){
            $header = view('frontend.layouts.header')->render();
            $response['header']=$header;
        }

        return json_encode($response);
    }

    public function cartDelete(Request $request){
        $id = $request->input('cart_id');
        Cart::instance('shopping')->remove($id);
        $response['statut']=true;
        $response['total']=Cart::subtotal();
        $response['cart_count']=Cart::instance('shopping')->count();
        $response['message']="Produit retiré avec succès";

        if($request->ajax()){
            $header = view('frontend.layouts.header')->render();
            $cartList = view('frontend.layouts._cart-lists')->render();
            $response['header']=$header;
            $response['cart_list']=$cartList;
        }
        return json_encode($response);
    }

    public function cartUpdate(Request $request){
        $this->validate($request,[
            'product_qty'=>'required|numeric',
        ]);
        $rowId = $request->input('rowId');
        $request_quantity = $request->input('product_qty');
        $productQuantity = $request->input('productQuantity');

        if($request_quantity > $productQuantity){
            $message = "Nous n'avons pas assez d'articles en stock !";
            $response['statut']=false;
        }elseif($request_quantity < 1){
            $message = "La quantité doit être supérieure ou égale à 1 !";
            $response['statut']=false;
        }else{
            Cart::instance('shopping')->update($rowId, $request_quantity);
            $message = "La quantité a été mise à jour avec succès !";
            $response['statut']=true;
            $response['total']=Cart::subtotal();
            $response['cart_count']=Cart::instance('shopping')->count();
        }

        if($request->ajax()){
            $header = view('frontend.layouts.header')->render();
            $cart_list = view('frontend.layouts._cart-lists')->render();
            $response['header']=$header;
            $response['cart_list']=$cart_list;
            $response['message']=$message;
        }

        return $response;
    }

    //Coupon
    public function couponAdd(Request $request){
        $coupon = Coupon::where(['statut'=>'active','code'=>$request->input('code')])->first();
        if(!$coupon){
            return back()->with('error', 'Coupon Invalide, veuillez saisir un coupon valide');
        }
        if($coupon){
            $total_price = (float)str_replace(',','',Cart::instance('shopping')->subtotal());
            session()->put('coupon',[
                'id'=>$coupon->id,
                'type'=>$coupon->type,
                'code'=>$coupon->code,
                'valeur'=>$coupon->discount($total_price),
            ]);
            return back()->with('success','Coupon appliqué avec succès');
        }
    }
}
