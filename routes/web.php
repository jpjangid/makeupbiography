<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'facebookRedirect']);

Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'loginWithFacebook']);

Route::get('unauthorized', function() {
    return "unauthorized";
});

Route::get('/admin', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','prevent-back-history','admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('backend.main.index');
    });

    Route::prefix('blogs')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\BlogController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\backend\BlogController::class, 'create']);
        Route::post('/store', [App\Http\Controllers\backend\BlogController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\BlogController::class, 'edit']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\BlogController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\BlogController::class, 'destroy']);
        Route::post('/update_status', [App\Http\Controllers\backend\BlogController::class, 'update_status']);
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
