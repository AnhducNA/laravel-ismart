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

Route::get('/checkCart', function(){

});

Route::get('/checkProduct', function () {
    $listProductCats = DB::table('product_cats')->get();
    $listProducts = DB::table('products')->get();
    $newListProducts = $listProducts;
    if (!empty($listProductCats)) {
        foreach ($listProductCats as $productCat) {
            foreach ($listProducts as $product) {
                if ($productCat->id == $product->product_cats_id) {
                    $productCat->name;
                }
            }
            // echo "<pre>" . "<br>";
            // print_r($productCat);
            // echo '----------';
            // print_r($newListProducts);
        }
    }
    echo "<pre>" . "<br>";
    print_r($listProducts);
    echo '----------' . '<br>';
    print_r($newListProducts);
});
