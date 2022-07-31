<?php

use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/product/cat/list', 'App\Http\Controllers\ProductController@listCat');
Route::get('/product/detail/show/{id}', 'App\Http\Controllers\ProductController@showDetail');
Route::get('/checkProduct', 'App\Http\Controllers\ProductController@check');

Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@addCart');
Route::get('/cart/delete/{id}', 'App\Http\Controllers\CartController@deleteItemCart');

Route::get('/viewListCart', 'App\Http\Controllers\CartController@viewListCart')
->name('viewListCart');
Route::get('/checkCart', 'App\Http\Controllers\CartController@check');
