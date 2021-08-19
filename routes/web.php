<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('login/facebook', [LoginController::class, 'facebookRedirect']);

Route::get('login/facebook/callback', [LoginController::class, 'loginWithFacebook']);

Route::get('unauthorized', function() {
    return "unauthorized";
});

Route::get('/admin', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth','prevent-back-history','admin'])->prefix('admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('backend.main.index');
        });
    });
    
});   

/* Route for front end Begin */
Route::get('/', function () {
    return view('frontend.main.index');
});
Route::view('product', 'frontend.product.detail');
Route::view('category', 'frontend.product.category');
Route::view('brand','frontend.brand.index');
Route::view('wishlist','frontend.wishlist.index');
Route::view('wishlist/empty','frontend.wishlist.empty');
Route::view('cart','frontend.cart.index');
Route::view('cart/empty','frontend.cart.empty');
Route::view('checkout','frontend.checkout.index');

/* Route for front end End */
