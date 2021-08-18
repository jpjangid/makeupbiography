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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Route for admin panel Begin */
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('backend.main.index');
    });
});
/* Route for admin panel End */

/* Route for front end Begin */
Route::get('/', function () {
    return view('frontend.main.index');
});
/* Route for front end End */
