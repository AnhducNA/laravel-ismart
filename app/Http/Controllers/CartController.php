<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    function check()
    {
        // session()->remove('Cart');
        if (!empty(session('Cart'))) {
            dd(session('Cart'));
        }
    }

    function addCart(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        if (isset($product)) {
            $oldCart = session('Cart') ? session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id);
            $request->session()->put('Cart', $newCart);
        }
        return view('cart.cart', compact('newCart'));
    }
    function deleteItemCart(Request $request, $id)
    {
        $oldCart = session('Cart') ? session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteItemCart($id);
        $request->session()->put('Cart', $newCart);
        return view('cart.cart', compact('newCart'));
    }
    function viewListCart()
    {
        // $listCart = session('Cart');
        return view('cart.list');
    }
}
