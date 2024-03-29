<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    function check()
    {
        $listProductCats = null;
        // convert object to array
        foreach (DB::table('product_cats')->get()->toArray() as $number => $productCatObject) {
            foreach ($productCatObject as $key => $value) {
                $listProductCats[$number][$key] = $value;
            }
        }

        $listProducts = DB::table('products')->get();
        $listProductsByID = null;

        foreach ($listProducts as $product) {
            $listProductsByID[$product->id] = $product;
        }

        foreach ($listProductCats as $stt => $productCat) {
            foreach ($listProductsByID as $key => $product) {
                if ($productCat['id'] == $product->product_cats_id) {
                    $productCat['products'][$product->id] = $product;
                }
            }
            $listProductCats[$stt] = $productCat;
        }
        echo "<pre>" . "<br>";
        // print_r($listProductCats);
        echo "<pre>" . "<br>";
        print_r($listProductsByID);
    }

    function viewIndex()
    {
        $listProductCats = null;
        // convert object to array
        foreach (DB::table('product_cats')->get()->toArray() as $number => $productCatObject) {
            foreach ($productCatObject as $key => $value) {
                $listProductCats[$number][$key] = $value;
            }
        }

        $listProducts = DB::table('products')->get();
        $listProductsByID = null;

        foreach ($listProducts as $product) {
            $listProductsByID[$product->id] = $product;
        }

        foreach ($listProductCats as $stt => $productCat) {
            foreach ($listProductsByID as $key => $product) {
                if ($productCat['id'] == $product->product_cats_id) {
                    $productCat['products'][$product->id] = $product;
                }
            }
            $listProductCats[$stt] = $productCat;
        }

        return view('index', compact('listProductCats', 'listProductsByID'));
    }
    function listCat()
    {
        $listProductCatsAll = null;
        // convert object to array
        foreach (DB::table('product_cats')->get()->toArray() as $number => $productCatObject) {
            foreach ($productCatObject as $key => $value) {
                $listProductCatsAll[$number][$key] = $value;
            }
        }

        $listProducts = DB::table('products')->get();
        $listProductsByID = null;

        foreach ($listProducts as $product) {
            $listProductsByID[$product->id] = $product;
        }

        foreach ($listProductCatsAll as $stt => $productCat) {
            foreach ($listProductsByID as $key => $product) {
                if ($productCat['id'] == $product->product_cats_id) {
                    $productCat['products'][$product->id] = $product;
                }
            }
            $listProductCatsAll[$stt] = $productCat;
        }

        return view('product.cat.list', compact('listProductCatsAll', 'listProductsByID'));
    }
    function showDetail($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('product.detail.show', compact('product'));
    }
}
