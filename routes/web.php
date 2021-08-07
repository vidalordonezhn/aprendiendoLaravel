<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', 'MainController@index')->name('main');

Route::resource('products', 'ProductController')->names('product');
Route::resource('products.carts', 'ProductCartController')->only(['destroy', 'store']);

Route::resource('carts', 'CartController')->only(['index']);
Route::resource('orders', 'OrderController')->only(['store', 'create']);
Route::resource('orders.payment', 'OrderPaymentController')->only(['store', 'create']);

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
 
// Route::get('products', 'ProductController@index')->name('product.index');
// Route::post('products', 'ProductController@store')->name('product.store');
// Route ::get('products/create', 'ProductController@create')->name('product.create');
// Route::get('products/{product}', 'ProductController@show')->name('product.show');
// // Route::get('products/{product:title}', 'ProductController@show')->name('product.show');
// Route::get('products/{product}/edit', 'ProductController@edit')->name('product.edit');
// Route::patch('products/{product}/update', 'ProductController@update')->name('product.update');
// Route::delete('products/{product}', 'ProductController@destroy')->name('product.delete');

