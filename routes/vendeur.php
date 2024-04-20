<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\Vendeur\LoginController;
use App\Http\Controllers\BanniereController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ProduitReviewController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\UserContoller;
use App\Http\Controllers\Vendeur\ProduitController;
use App\Http\Controllers\Vendeur\CommandeController;
use App\Http\Controllers\VendeurController;
use App\Models\Categorie;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




Route::group(['prefix'=>'vendeur','middleware'=>['vendeur']],function(){
    Route::get('/',[VendeurController::class, 'dashboard'])->name('vendeur');
});


//Vendeur Login
Route::group(['prefix'=>'vendeur'],function(){
    Route::get('/login',[LoginController::class, 'showLoginForm'])->name('vendeur.login.form');
    Route::post('/login',[LoginController::class, 'login'])->name('vendeur.login');

    //Produit Section
    Route::resource('/vendeur-produit', ProduitController::class);
    Route::post('vendeur_produit_statut', [ProduitController::class, 'produitStatut'])->name('vendeur.produit.statut');

    //Produit attribut
    Route::post('vendeur-produit-attribut/{id}', [ProduitController::class, 'addProduitAttribut'])->name('vendeur.produit.attribut');
    Route::delete('vendeur-produit-attribut-delete/{id}', [ProduitController::class, 'deleteProduitAttribut'])->name('vendeur.produit.attribut.destroy');

    //Commande section
    Route::resource('/vendeur-commande', App\Http\Controllers\Vendeur\CommandeController::class);
    Route::post('vendeur-commande-statut', [CommandeController::class, 'commadeStatut'])->name('vendeur.commande.statut');
    Route::post('vendeur-commandeproduit/{id}', [CommandeController::class, 'commadeProduitStatut'])->name('vendeur.commande.produit.statut');
});


Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth:vendeur']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});