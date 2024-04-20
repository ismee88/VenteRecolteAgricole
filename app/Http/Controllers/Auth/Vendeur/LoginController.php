<?php

namespace App\Http\Controllers\Auth\Vendeur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('vendeur.auth.login');
    }

    public function login(Request $request){
        if(Auth::guard('vendeur')->attempt(['email'=>$request->email, 'password'=>$request->password, 'statut'=>'active'])){
            return redirect()->intended(route('vendeur'));
        }
        return back()->withInput($request->only('email'));
    }
}
