<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\BanniereController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProduitReviewController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\UserContoller;
use App\Models\Categorie;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/',[IndexController::class, 'home'])->name('home');

//Authentification
Route::get('user/login', [IndexController::class, 'userLogin'])->name('user.login');
Route::get('user/logout',[IndexController::class, 'userLogout'])->name('user.logout');
Route::get('user/register', [IndexController::class, 'userRegister'])->name('user.register');
Route::post('user/login',[IndexController::class, 'loginSubmit'])->name('login.submit');
Route::post('user/register',[IndexController::class, 'registerSubmit'])->name('register.submit');


//Categorie produit
Route::get('categorie-produit/{slug}/',[IndexController::class, 'categorieProduit'])->name('categorie.produit');

//Shop Section
Route::get('shop',[IndexController::class, 'shop'])->name('shop');
Route::post('shop-filter',[IndexController::class, 'shopFilter'])->name('shop.filter');

//Search product & aautosearch product
Route::get('autosearch',[IndexController::class, 'autoSearch'])->name('autosearch');
Route::get('search',[IndexController::class, 'search'])->name('search');

//Detail Produit
Route::get('detail-produit/{slug}/', [IndexController::class, 'detailProduit'])->name('detail.produit');

//Produit Review
ROute::post('produit-review/{slug}', [ProduitReviewController::class, 'produitReview'])->name('produit.review');

//Cart section
Route::get('cart',[CartController::class, 'cart'])->name('cart');
Route::post('cart/store', [CartController::class, 'cartStore'])->name('cart.store');
Route::post('cart/delete', [CartController::class, 'cartDelete'])->name('cart.delete');
Route::post('cart/update', [CartController::class, 'cartUpdate'])->name('cart.update');

//Coupon section
Route::post('coupon/add',[CartController::class, 'couponAdd'])->name('coupon.add');

//favoris section
Route::get('wishlist',[WishlistController::class, 'wishlist'])->name('wishlist');
Route::post('wishlist/store',[WishlistController::class, 'wishlistStore'])->name('wishlist.store');
Route::post('wishlist/move-to-cart',[WishlistController::class, 'moveToCart'])->name('wishlist.move.cart');
Route::post('wishlist/delete',[WishlistController::class, 'wishlistDelete'])->name('wishlist.delete');

//Checkout section
Route::get('checkout1',[CheckoutController::class,'checkout1'])->name('checkout1')->middleware('user');
Route::post('checkout-first',[CheckoutController::class,'checkout1Store'])->name('checkout1.store');
Route::post('checkout-two',[CheckoutController::class,'checkout2Store'])->name('checkout2.store');
Route::post('checkout-three',[CheckoutController::class,'checkout3Store'])->name('checkout3.store');
Route::get('checkout',[CheckoutController::class,'checkoutStore'])->name('checkout.store');
Route::get('complete/{commande}',[CheckoutController::class,'complete'])->name('complete');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);


// User Dashbord
Route::group(['prefix'=>'user'], function(){
    Route::get('/dashboard', [IndexController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/order', [IndexController::class, 'userOrder'])->name('user.order');
    Route::get('/address', [IndexController::class, 'userAddress'])->name('user.address');
    Route::get('/account-detail', [IndexController::class, 'userAccount'])->name('user.account');

    Route::post('/billing/address/{id}',[IndexController::class, 'billingAddress'])->name('billing.address');
    Route::post('/shipping/address/{id}',[IndexController::class, 'shippingAddress'])->name('shipping.address');

    Route::post('/update/account/{id}',[IndexController::class, 'updateAccount'])->name('account.update');
});
