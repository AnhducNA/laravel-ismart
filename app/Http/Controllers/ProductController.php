<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function listCat()
    {
        return view('product.cat.list');
    }
    function showDetail($id)
    {
        return view('product.detail.show');
    }
}
