<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function check(){
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
    }
    function listCat()
    {
        $listProductCats = DB::table('product_cats')->get();
        $listProducts = DB::table('products')->get();

        // if (!empty($listProductCats)) {
        //     foreach ($listProductCats as $item) {
        //         if ($item->id == $listProducts->id) {
        //             echo $item->id;
        //         }
        //     }
        // }
        $listSmartphones = DB::table('products')->get()->where('product_cats_id', 1);
        $listTablet = DB::table('products')->get()->where('product_cats_id', 2);
        $listLaptop = DB::table('products')->get()->where('product_cats_id', 3);
        return view('product.cat.list', compact('listProductCats', 'listProducts'));
    }
    function showDetail($id)
    {
        return view('product.detail.show');
    }
}
