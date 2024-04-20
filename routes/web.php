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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//**********************Frontend section************************//

require __DIR__ . '/frontend.php';

//**********************End frontend section***********************//



//********************************Backend Admin section************************//

require __DIR__ . '/backend.php';

//******************************** End Backend Admin section************************//



require __DIR__ . '/vendeur.php';


Auth::routes(['register'=>false]);




