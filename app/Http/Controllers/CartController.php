<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    function check()
    {
        session()->remove('Cart');
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
        $product = DB::table('products')->where('id', $id)->first();
        if (isset($product)) {
            $oldCart = session('Cart') ? session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->deleteItemCart($id);
            if (count($newCart->products) != 0) {
                $request->session()->put('Cart', $newCart);
            } else {
                $newCart->totalPrice == 0;
                $newCart->totalQuanty == 0;
            }
        }
        return view('cart.cart', compact('newCart'));
    }
}
