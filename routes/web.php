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

Route::get('/', 'MainController@index')->name('index');

Route::resource('products.carts', 'ProductCartController')->only(['store','destroy']);

Route::resource('carts', 'CartController')->only(['index']);

Route::resource('orders', 'OrderController')
    ->only(['create','store'])
    ->middleware(['verified']);

Route::resource('orders.payments', 'OrderPaymentController')
    ->only(['create','store'])
    ->middleware(['verified']);

Auth::routes([
    'verify' => true
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
