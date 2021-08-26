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

    Route::prefix('pages')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\PageController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\backend\PageController::class, 'create']);
        Route::post('/store', [App\Http\Controllers\backend\PageController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\PageController::class, 'edit']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\PageController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\PageController::class, 'destroy']);
        Route::post('/update_status', [App\Http\Controllers\backend\PageController::class, 'update_status']);
    });

    Route::prefix('brands')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\BrandController::class, 'index']);
        Route::get('/create',[App\Http\Controllers\backend\BrandController::class,'create']);
        Route::post('/store',[App\Http\Controllers\backend\BrandController::class,'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\BrandController::class, 'edit']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\BrandController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\BrandController::class, 'destroy']);
        Route::post('/update_status', [App\Http\Controllers\backend\BrandController::class, 'update_status']);
    });

    Route::prefix('redirections')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\RedirectionController::class, 'index']);
        Route::get('/create',[App\Http\Controllers\backend\RedirectionController::class,'create']);
        Route::post('/store',[App\Http\Controllers\backend\RedirectionController::class,'store']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\RedirectionController::class, 'destroy']);
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\CategoryController::class, 'index']);
        Route::get('/create',[App\Http\Controllers\backend\CategoryController::class,'create']);
        Route::post('/store',[App\Http\Controllers\backend\CategoryController::class,'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\CategoryController::class, 'edit']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\CategoryController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\CategoryController::class, 'destroy']);
        Route::post('/update_status', [App\Http\Controllers\backend\CategoryController::class, 'update_status']);
    });

    Route::prefix('sub/categories')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\CategoryController::class, 'index_sub1']);
        Route::get('/create',[App\Http\Controllers\backend\CategoryController::class,'create_sub1']);
        Route::post('/store',[App\Http\Controllers\backend\CategoryController::class,'store_sub1']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\CategoryController::class, 'edit_sub1']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\CategoryController::class, 'update_sub1']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\CategoryController::class, 'destroy_sub1']);
        Route::post('/update_status', [App\Http\Controllers\backend\CategoryController::class, 'update_status_sub1']);
    });

    Route::prefix('sub/sub/categories')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\CategoryController::class, 'index_sub2']);
        Route::get('/create',[App\Http\Controllers\backend\CategoryController::class,'create_sub2']);
        Route::post('/store',[App\Http\Controllers\backend\CategoryController::class,'store_sub2']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\CategoryController::class, 'edit_sub2']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\CategoryController::class, 'update_sub2']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\CategoryController::class, 'destroy_sub2']);
        Route::post('/update_status', [App\Http\Controllers\backend\CategoryController::class, 'update_status_sub2']);
    });


   

});

/* Route for frontend Begin */
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
Route::view('myaccount','frontend.myaccount.myaccount');
Route::view('newlogin','auth.newlogin');

// Route::view('faq','frontend.page.faq');
// Route::view('return/policy','frontend.page.return_policy');
// Route::view('shipping/policy','frontend.page.shipping_policy');
// Route::view('cancellation/policy','frontend.page.cancellation_policy');
// Route::view('privacy/policy','frontend.page.privacy_policy');
// Route::view('terms&conditions','frontend.page.terms&conditions');
// Route::view('aboutus','frontend.page.aboutus');
Route::view('404','404');
Route::view('newlogin','auth.newlogin');

Route::get('{slug}', [App\Http\Controllers\frontend\PageController::class, 'index']);
Route::get('blogs/{cat}', [App\Http\Controllers\frontend\BlogController::class, 'index']);
Route::get('blogs/{cat}/{slug}', [App\Http\Controllers\frontend\BlogController::class, 'detail']);

Route::post('storecomment', [App\Http\Controllers\frontend\CommentController::class, 'store']);

/* Route for front end End */
