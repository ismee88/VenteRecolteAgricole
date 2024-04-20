<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banniere;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class IndexController extends Controller
{

    //Home
    public function home(){
        $user = Auth::user();
        $bannieres = Banniere::where(['statut'=>'active','condition'=>'banniere'])->orderBy('id','DESC')->limit('5')->get();
        $categories = Categorie::where(['statut'=>'active'])->limit(3)->orderBy('id','DESC')->get();
        return view('frontend.index',compact(['bannieres','categories','user']));
    }


    //Produit ccategorie
    public function categorieProduit(Request $request, $slug){
        $categories = Categorie::with(['produits'])->where('slug',$slug)->first();

        //pour le trie
        $sort = '';
        if($request->sort != null){
            $sort = $request->sort;
        }
        if($categories == null){
            return view('errors.404');
        }
        else{
            if($sort == 'prixAsc'){
                // $produits = Produit::where(['statut'=>'active', 'cat_id'=>$categories->id])->orderBy('offre_prix','ASC')->paginate(12);
                $produits = Produit::where(['statut'=>'active', 'cat_id'=>$categories->id])->orderBy('offre_prix','ASC')->get();
            }elseif($sort == 'prixDesc'){
                $produits = Produit::where(['statut'=>'active', 'cat_id'=>$categories->id])->orderBy('offre_prix','DESC')->get();
            }elseif($sort == 'titreAsc'){
                $produits = Produit::where(['statut'=>'active', 'cat_id'=>$categories->id])->orderBy('titre','ASC')->get();
            }elseif($sort == 'titreDesc'){
                $produits = Produit::where(['statut'=>'active', 'cat_id'=>$categories->id])->orderBy('titre','DESC')->get();
            }else{
                $produits = Produit::where(['statut'=>'active', 'cat_id'=>$categories->id])->get();
            }
        }
        $route = 'categorie-produit';


        // if($request->ajax()){
        //     $view = view('frontend.layouts._single-product', compact('produits'))->render();
        //     return response()->json(['html'=>$view]);
        //     return $view;
        // }
        return view('frontend.pages.produit.produit-categorie', compact(['categories','route','produits']));
    }


    //Shop
    public function shop(Request $request){

        $produits = Produit::query();

        //Categorie
        if(!empty($_GET['categorie'])){
            $slugs = explode(',',$_GET['categorie']);
            $cat_ids = Categorie::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            $produits = $produits->whereIn('cat_id',$cat_ids);
        }
        //Trie
        if(!empty($_GET['sortBy'])){
            // $sort = $_GET['sortBy'];
            if($_GET['sortBy'] == 'prixAsc'){
                // $produits = Produit::where(['statut'=>'active', 'cat_id'=>$categories->id])->orderBy('offre_prix','ASC')->paginate(12);
                $produits = $produits->where(['statut'=>'active'])->orderBy('offre_prix','ASC');
            }if($_GET['sortBy'] == 'prixDesc'){
                $produits = $produits->where(['statut'=>'active'])->orderBy('offre_prix','DESC');
            }if($_GET['sortBy'] == 'titreAsc'){
                $produits = $produits->where(['statut'=>'active'])->orderBy('titre','ASC');
            }if($_GET['sortBy'] == 'titreDesc'){
                $produits = $produits->where(['statut'=>'active'])->orderBy('titre','DESC');
            }
        }
        //Prix
        if(!empty($_GET['price'])){
            $price = explode('-',$_GET['price']);
            $price[0]=floor($price[0]);
            $price[1]=ceil($price[1]);
            $produits =  $produits->whereBetween('offre_prix', $price)->where('statut','active')->paginate(12);
        }
        else{
            $produits = $produits->where('statut','active')->paginate(12);
        }

        $cats = Categorie::where(['statut'=>'active'])->with('produits')->orderBy('titre','ASC')->get();
        
        return view('frontend.pages.produit.shop',compact('produits', 'cats'));
    }

    //Shop filter
    public function shopFilter(Request $request){
        $data = $request->all();

        // Categorie filter
        $catUrl = '';
        if(!empty($data['categorie'])){
            foreach($data['categorie'] as $categorie){
                if(empty($catUrl)){
                    $catUrl .='&categorie='.$categorie;
                }
                else{
                    $catUrl .=','.$categorie;
                }
            }
        }

        //sort filter
        $sortByUrl = "";
        if(!empty($data['sortBy'])){
            $sortByUrl .='&sortBy='.$data['sortBy'];
        }

        //Price Filter
        $price_range_Url = "";
        if(!empty($data['price_range'])){
            $price_range_Url .='&price='.$data['price_range'];
        }

        //Brand filter
        $brandUrl="";
        if(!empty($data['brand'])){
            foreach($data['brand'] as $brand){
                if(empty($brandUrl)){
                    $brandUrl .='&brand='.$brand;
                }
                else{
                    $brandUrl .=','.$brand;
                }
            }
        }

        return \redirect()->route('shop',$catUrl.$sortByUrl.$price_range_Url.$brandUrl);
    }


    //Autosearch
    public function autoSearch(Request $request){
        $query = $request->get('term','');
        $produits = Produit::where('titre','LIKE','%'.$query.'%')->where('statut','active')->get();

        $data = array();
        foreach($produits as $produit){
            $data[] = array('value'=>$produit->titre,'id'=>$produit->id);
        }
        if(count($data)){
            return $data;
        }else{
            return ['value'=>"Aucun résultat trouvé",'id'=>''];
        }
    } 

    //Search
    public function search(Request $request){
        $query = $request->input('query');
        $produits = Produit::where('titre','LIKE','%'.$query.'%')->where('statut','active')->orderBy('id','DESC')->paginate(12);

        $cats = Categorie::where(['statut'=>'active'])->with('produits')->orderBy('titre','ASC')->get();

        return view('frontend.pages.produit.shop',compact('produits', 'cats',));
    }


    public function detailProduit($slug){
        $produit = Produit::with('rel_prods')->where('slug',$slug)->first();
        //  return $produit;
        if($produit){
            return view('frontend.pages.produit.detail-produit', compact(['produit']));
        }
        else{
            return 'Aucun detail trouver';
        }
    }

    //user auth
    public function userLogin(){
        // Session::put('url.intended',URL::previous());
        // if ($redirectTo = session('redirectTo')) {
        //     session()->forget('redirectTo');
        //     return redirect()->to($redirectTo);
        // }

        return view('frontend.auth.login');
    }

    public function userRegister(){
        return view('frontend.auth.register');
    }

    public function loginSubmit(Request $request){
        $this->validate($request,[
            'email' => 'email|required|exists:users,email',
            'password' => 'required|min:4',
        ]);
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'statut'=>'active'])){
            Session::put('user',$request->email);
            
            if(Session::get('url.intended')){
                return Redirect::to(Session::get('url.intended'));
            }
            else{
                return redirect()->route('home')->with('success','Connexion réussie');
            }
        }
        else{
            return back()->with('error', 'Email ou Mot de passe invalide');
        }
    }

    public function registerSubmit(Request $request){
        $this->validate($request, [
            'nom_complet' => 'string|required',
            'username' => 'string|nullable',
            'email' => 'email|required|unique:users,email',
            'password' => 'min:6|required|confirmed',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        Session::put('user',$data['email']);
        Auth::login($check);
        if($check){
            return redirect()->route('home')->with('success','Enregistrement réussi');
        }else{
            return back()->with('error', ['veuillez vérifier vos références']);
        }
    }

    private function create(array $data){
        return User::create([
            'nom_complet' => $data['nom_complet'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function userLogout()
    {
        Session::forget('user');
        Auth::logout();
        return \redirect()->route('home')->with('success','Déconnexion réussie');
    }

    public function userDashboard(){
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }
        $user = Auth::user();
        return view('frontend.user.dashboard', compact('user'));
    }
    public function userOrder(){
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }
        $user = Auth::user();
        return view('frontend.user.order', compact('user'));
    }
    public function userAddress(){
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }
        $user = Auth::user();
        return view('frontend.user.address', compact('user'));
    }
    public function userAccount(){
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }
        $user = Auth::user();
        return view('frontend.user.account', compact('user'));
    }

    public function billingAddress(Request $request, $id){
        $user = User::where('id',$id)->update([
            'pays'=>$request->pays,
            'ville'=>$request->ville,
            'adresse'=>$request->adresse,
            'etat'=>$request->etat,
            'code_postal'=>$request->code_postal,
        ]);
        if($user){
            return back()->with('success','Adresse modifier avec succès');
        }else{
            return back()->with('error',"Quelque chose n'a pas fonctionné");
        }
    }

    public function shippingAddress(Request $request, $id){
        $user = User::where('id',$id)->update([
            'spays'=>$request->spays,
            'sville'=>$request->sville,
            'sadresse'=>$request->sadresse,
            'setat'=>$request->setat,
            'scode_postal'=>$request->scode_postal,
        ]);
        if($user){
            return back()->with('success','Adresse modifier avec succès');
        }else{
            return back()->with('error',"Quelque chose n'a pas fonctionné");
        }
    }

    public function updateAccount(Request $request, $id){
        $this->validate($request,[
            'newpassword'=>'nullable|min:6',
            'nom_complet'=>'string|required',
            'username'=>'string|nullable',
            'telephone'=>'string|min:8',
        ]);

        $hashpassword = Auth::user()->password;

        if($request->oldpassword == null && $request->newpassword == null){
            User::where('id',$id)->update([
                'nom_complet'=>$request->nom_complet,
                'username'=>$request->username,
                'telephone'=>$request->telephone,
            ]);
            return back()->with('success','Compte mis à jour avec succès');
        }else{
            if(Hash::check($request->oldpassword, $hashpassword)){
                if($request->newpassword == null){
                    return back()->with('error','Veuillez saisir le nouveau mot de passe');
                }else{
                    if(!Hash::check($request->newpassword, $hashpassword)){
                        User::where('id',$id)->update([
                            'nom_complet'=>$request->nom_complet,
                            'username'=>$request->username,
                            'telephone'=>$request->telephone,
                            'password' => bcrypt($request->newpassword),
                        ]);
                        return back()->with('success','Compte mis à jour avec succès');
                    }else{
                        return back()->with('error',"le nouveau mot de passe ne peut pas être identique à l'ancien");
                    }
                }
            }else{
                return back()->with('error',"le mot de passe actuel ne correspond pas");
            }
        }
    }
}
