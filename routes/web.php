<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('test', [App\Http\Controllers\ApiTestController::class, 'index']);

Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'facebookRedirect']);
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'loginWithFacebook']);

Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'googleRedirect']);
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'loginWithGoogle']);

Route::get('unauthorized', function () {
    return "unauthorized";
});

Route::get('/admin', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\frontend\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'prevent-back-history', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\backend\DashboardController::class, 'index']);
    Route::post('/dashboard', [App\Http\Controllers\backend\DashboardController::class, 'dashboard']);

    Route::prefix('notifications')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\NotificationController::class, 'index']);
        Route::post('list',[App\Http\Controllers\backend\NotificationController::class, 'notificationListItems']);
    });    

    Route::prefix('bulkupload')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\BulkUploadController::class, 'index']);
        Route::post('upload',[App\Http\Controllers\backend\BulkUploadController::class, 'upload']);
        Route::post('update',[App\Http\Controllers\backend\BulkUploadController::class, 'update']);
        Route::get('imageupload', [App\Http\Controllers\backend\BulkUploadController::class, 'imageupload']);
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
        Route::get('/create', [App\Http\Controllers\backend\BrandController::class, 'create']);
        Route::post('/store', [App\Http\Controllers\backend\BrandController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\BrandController::class, 'edit']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\BrandController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\BrandController::class, 'destroy']);
        Route::post('/update_status', [App\Http\Controllers\backend\BrandController::class, 'update_status']);
    });

    Route::prefix('redirections')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\RedirectionController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\backend\RedirectionController::class, 'create']);
        Route::post('/store', [App\Http\Controllers\backend\RedirectionController::class, 'store']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\RedirectionController::class, 'destroy']);
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\CategoryController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\backend\CategoryController::class, 'create']);
        Route::post('/store', [App\Http\Controllers\backend\CategoryController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\CategoryController::class, 'edit']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\CategoryController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\CategoryController::class, 'destroy']);
        Route::post('/update_status', [App\Http\Controllers\backend\CategoryController::class, 'update_status']);
    });

    Route::prefix('sub/categories')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\CategoryController::class, 'index_sub1']);
        Route::get('/create', [App\Http\Controllers\backend\CategoryController::class, 'create_sub1']);
        Route::post('/store', [App\Http\Controllers\backend\CategoryController::class, 'store_sub1']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\CategoryController::class, 'edit_sub1']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\CategoryController::class, 'update_sub1']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\CategoryController::class, 'destroy_sub1']);
        Route::post('/update_status', [App\Http\Controllers\backend\CategoryController::class, 'update_status_sub1']);
    });

    Route::prefix('sub/sub/categories')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\CategoryController::class, 'index_sub2']);
        Route::get('/create', [App\Http\Controllers\backend\CategoryController::class, 'create_sub2']);
        Route::post('/store', [App\Http\Controllers\backend\CategoryController::class, 'store_sub2']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\CategoryController::class, 'edit_sub2']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\CategoryController::class, 'update_sub2']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\CategoryController::class, 'destroy_sub2']);
        Route::post('/update_status', [App\Http\Controllers\backend\CategoryController::class, 'update_status_sub2']);
    });

    Route::prefix('labels')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\LabelController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\backend\LabelController::class, 'create']);
        Route::post('/store', [App\Http\Controllers\backend\LabelController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\LabelController::class, 'edit']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\LabelController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\LabelController::class, 'destroy']);
        Route::post('/update_status', [App\Http\Controllers\backend\LabelController::class, 'update_status']);
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\ProductController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\backend\ProductController::class, 'create']);
        Route::post('/store', [App\Http\Controllers\backend\ProductController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\ProductController::class, 'edit']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\ProductController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\ProductController::class, 'destroy']);
        Route::post('/update_status', [App\Http\Controllers\backend\ProductController::class, 'update_status']);
        Route::post('/cat', [App\Http\Controllers\backend\ProductController::class, 'cat']);
        Route::get('/mediadelete/{id}', [App\Http\Controllers\backend\ProductController::class, 'mediadelete']);
    });

    Route::prefix('coupons')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\CouponController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\backend\CouponController::class, 'create']);
        Route::post('/store', [App\Http\Controllers\backend\CouponController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\CouponController::class, 'edit']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\CouponController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\CouponController::class, 'destroy']);
        Route::post('/update_status', [App\Http\Controllers\backend\CouponController::class, 'update_status']);
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\UserController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\backend\UserController::class, 'create']);
        Route::post('/store', [App\Http\Controllers\backend\UserController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\UserController::class, 'edit']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\UserController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\UserController::class, 'destroy']);
    });

    Route::prefix('wallets')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\WalletController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\backend\WalletController::class, 'create']);
        Route::post('/store', [App\Http\Controllers\backend\WalletController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\WalletController::class, 'edit']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\WalletController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\WalletController::class, 'destroy']);
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\OrderController::class, 'index']);
        Route::get('/order_detail/{id}', [App\Http\Controllers\backend\OrderController::class, 'order_detail']);
        Route::post('/update', [App\Http\Controllers\backend\OrderController::class, 'update']);
    });

    Route::prefix('returns')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\ReturnController::class, 'index']);
        Route::get('/return_detail/{id}', [App\Http\Controllers\backend\ReturnController::class, 'return_detail']);
        Route::post('/update', [App\Http\Controllers\backend\ReturnController::class, 'update']);
    });
    
    Route::prefix('footer/banners')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\FooterBannerController::class, 'index']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\FooterBannerController::class, 'edit']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\FooterBannerController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\FooterBannerController::class, 'destroy']);
        Route::post('/update_status', [App\Http\Controllers\backend\FooterBannerController::class, 'update_status']);
    });
    
    Route::prefix('related_products')->group(function () {
        Route::get('/', [App\Http\Controllers\backend\RelatedProductController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\backend\RelatedProductController::class, 'create']);
        Route::post('/store', [App\Http\Controllers\backend\RelatedProductController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\backend\RelatedProductController::class, 'edit']);
        Route::put('/update/{id}', [App\Http\Controllers\backend\RelatedProductController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\backend\RelatedProductController::class, 'destroy']);
    });

    //route for profile update
    Route::get('profile', [App\Http\Controllers\Auth\ProfileController::class, 'edit']);
});

/* Route for frontend Begin */
Route::middleware(['auth', 'prevent-back-history'])->group(function () {

    //My account routes
    Route::get('my-account', [App\Http\Controllers\frontend\MyAccountController::class, 'myaccount']);
    Route::get('my-wallet', [App\Http\Controllers\frontend\MyAccountController::class, 'mywallet']);
    Route::view('mywishlistempty', 'frontend.myaccount.mywishlist_empty');
    Route::get('my-wishlist', [App\Http\Controllers\frontend\MyAccountController::class, 'wishlist']);
    Route::get('my-orders', [App\Http\Controllers\frontend\MyAccountController::class, 'myorders']);
    Route::get('return-orders', [App\Http\Controllers\frontend\MyAccountController::class, 'return_orders']);
    Route::get('detail/{order_no}', [App\Http\Controllers\frontend\MyAccountController::class, 'order_detail']);
    Route::get('q&a', [App\Http\Controllers\frontend\MyAccountController::class, 'question_answers']);

    Route::view('questionanswer', 'frontend.myaccount.question_answer');
    Route::view('wishlist', 'frontend.wishlist.index');

    //Route for profile update
    Route::patch('profile/{id}', [App\Http\Controllers\Auth\ProfileController::class, 'update'])->name('profile');

    //Route for Cart
    Route::get('checkout', [App\Http\Controllers\frontend\CartController::class, 'checkout']);
    Route::post('checkout/apply_coupon',[App\Http\Controllers\frontend\CartController::class, 'couponApply']);
    Route::post('checkout/razorpay',[App\Http\Controllers\frontend\CartController::class, 'create_razorpay_order']);
    Route::get('checkout/coupon/apply', [App\Http\Controllers\frontend\CartController::class, 'checkoutCouponGet']);

    //Store Order
    Route::post('order/orderstore',[App\Http\Controllers\frontend\OrderController::class, 'index']);

    //Route for myaddress
    Route::get('my-address', [App\Http\Controllers\frontend\MyAccountController::class, 'myaddress']);
    Route::get('my-address/create', [App\Http\Controllers\frontend\MyAccountController::class, 'myAddressViewCreate']);
    Route::post('my-address/create', [App\Http\Controllers\frontend\MyAccountController::class, 'myAddressStore']);
    Route::get('my-address/edit/{id}', [App\Http\Controllers\frontend\MyAccountController::class, 'myAddressEdit']);
    Route::patch('my-address/update/{id}', [App\Http\Controllers\frontend\MyAccountController::class, 'myAddressUpdate']);

    //Route for favrouite
    Route::post('wishlist/add',[App\Http\Controllers\frontend\FavoriteController::class, 'store']);
    Route::get('wishlist/delete/{id}',[App\Http\Controllers\frontend\FavoriteController::class, 'destroy']);
    Route::get('wishlist',[App\Http\Controllers\frontend\FavoriteController::class, 'index']);
    Route::post('wishlist/add/to/cart',[App\Http\Controllers\frontend\FavoriteController::class, 'addToCart']);

    //Route get location
    Route::post('checkout/get/location',[App\Http\Controllers\frontend\MyAccountController::class, 'getMyAddress']);

});

//Route for search bar 
Route::post('search',[App\Http\Controllers\frontend\HomeController::class, 'search']);

//Route for Add to Cart
Route::get('cart', [App\Http\Controllers\frontend\CartController::class, 'list']);
Route::get('remove/cart/item/{id}', [App\Http\Controllers\frontend\CartController::class, 'remove_item']);
Route::get('add/to/cart', [App\Http\Controllers\frontend\CartController::class, 'add_to_cart']);
Route::post('cart/items/update', [App\Http\Controllers\frontend\CartController::class, 'update_items']);
Route::post('cart/item/update/product',[App\Http\Controllers\frontend\CartController::class, 'update_cart_items'])->name('cartItemUpdate');

//Route for brands page
Route::get('brands',[App\Http\Controllers\frontend\BrandController::class, 'index']);
Route::get('brands/{slug}',[App\Http\Controllers\frontend\BrandController::class, 'index_brands']);

//Route for main home page
Route::get('/', [App\Http\Controllers\frontend\HomeController::class, 'index']);

Route::view('discount', 'email_templates.Discount');
Route::view('completed', 'email_templates.Ordercompleted-card');

Route::view('product', 'frontend.product.detail');
Route::view('category', 'frontend.product.category');
Route::view('wishlist/empty', 'frontend.wishlist.empty');
// Route::view('cart', 'frontend.cart.index');
Route::view('cart/empty', 'frontend.cart.empty');

Route::view('myaccount', 'frontend.myaccount.myaccount');
Route::get('shop/{tag}', [App\Http\Controllers\frontend\CategoryController::class, 'shop']);
Route::view('brand', 'frontend.brand.index');
Route::view('contactus', 'frontend.page.contactus');

// Route::view('faq','frontend.page.faq');
// Route::view('return/policy','frontend.page.return_policy');
// Route::view('shipping/policy','frontend.page.shipping_policy');
// Route::view('cancellation/policy','frontend.page.cancellation_policy');
// Route::view('privacy/policy','frontend.page.privacy_policy');
// Route::view('terms&conditions','frontend.page.terms&conditions');
// Route::view('aboutus','frontend.page.aboutus');
Route::view('newlogin', 'auth.newlogin');

Route::post('review/store', [App\Http\Controllers\frontend\ReviewController::class, 'index']);

Route::get('blogs/{cat}', [App\Http\Controllers\frontend\BlogController::class, 'index']);
Route::get('blogs/{cat}/{slug}', [App\Http\Controllers\frontend\BlogController::class, 'detail']);

Route::get('category/{slug}', [App\Http\Controllers\frontend\CategoryController::class, 'index']);
Route::get('products/{product}', [App\Http\Controllers\frontend\ProductController::class, 'index']);
Route::post('orders',[App\Http\Controllers\frontend\OrderController::class, 'index']);
Route::get('orders/thanks/{order_no}', [App\Http\Controllers\frontend\OrderController::class, 'thankyou_page']);
Route::post('orders/return', [App\Http\Controllers\frontend\ReturnController::class, 'index']);

Route::post('storecomment', [App\Http\Controllers\frontend\CommentController::class, 'store']);
Route::get('{slug}', [App\Http\Controllers\frontend\PageController::class, 'index']);
Route::view('404', '404');
/* Route for front end End */
