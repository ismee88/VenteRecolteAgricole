<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\BanniereController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\ParamettreController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProduitReviewController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\UserContoller;
use App\Models\Categorie;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




//Admin Login
Route::group(['prefix'=>'admin'],function(){
    Route::get('/login',[LoginController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/login',[LoginController::class, 'login'])->name('admin.login');
});



Route::group(['prefix'=>'admin','middleware'=>['admin']],function(){
    Route::get('/',[AdminController::class, 'admin'])->name('admin');

    //Banniere Section
    Route::resource('/banniere', App\Http\Controllers\BanniereController::class);
    Route::post('banniere_statut', [BanniereController::class, 'banniereStatut'])->name('banniere.statut');

    //Categorie Section
    Route::resource('/categorie', App\Http\Controllers\CategorieController::class);
    Route::post('categorie_statut', [CategorieController::class, 'categorieStatut'])->name('categorie.statut');

    Route::post('categorie/{id}/child',[CategorieController::class, 'getChildByParentID']);

    //Marque Section
    Route::resource('/marque', App\Http\Controllers\MarqueController::class);
    Route::post('marque_statut', [MarqueController::class, 'marqueStatut'])->name('marque.statut');

    //Produit Section
    Route::resource('/produit', App\Http\Controllers\ProduitController::class);
    Route::post('produit_statut', [ProduitController::class, 'produitStatut'])->name('produit.statut');
    //Produit attribut
    Route::post('produit-attribut/{id}', [ProduitController::class, 'addProduitAttribut'])->name('produit.attribut');
    Route::delete('produit-attribut-delete/{id}', [ProduitController::class, 'deleteProduitAttribut'])->name('produit.attribut.destroy');


    //User Section
    Route::resource('/user', App\Http\Controllers\UserContoller::class);
    Route::post('user_statut', [UserContoller::class, 'userStatut'])->name('user.statut');

    //Coupon Section
    Route::resource('/coupon', App\Http\Controllers\CouponController::class);
    Route::post('coupon_statut', [CouponController::class, 'couponStatut'])->name('coupon.statut');

    //Shippin Section
    Route::resource('/shipping', App\Http\Controllers\ShippingController::class);
    Route::post('shipping_statut', [ShippingController::class, 'shippingStatut'])->name('shipping.statut');

    //Commande section
    Route::resource('/commande', App\Http\Controllers\CommandeController::class);
    Route::post('commande-statut', [CommandeController::class, 'commadeStatut'])->name('commande.statut');

    //Parametre section
    Route::get('parametre',[ParametreController::class, 'parametre'])->name('parametre');
    Route::put('parametre',[ParametreController::class, 'parametreUpdate'])->name('parametre.update');

});


Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth:admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});