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

Route::get('/', 'MainController@index')->name('main');

Route::get('products','ProductController@index')->name('products.index');

Route::get('products/create', 'ProductController@create')->name('products.create');

Route::get('products/store', 'ProductController@store')->name('products.store');

Route::get('products/{product}','ProductController@show')->name('products.show');

Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit');

Route::match(['put','match'],'products/{product}','ProductController@update')->name('products.update');

Route::delete('products/{product}','ProductController@delete')->name('products.destroy');