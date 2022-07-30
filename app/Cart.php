<?php

namespace App;



class Cart
{
    public $products = null;
    public $totalQuanty = 0;
    public $totalPrice = 0;

    function __construct($cart)
    {
        $this->products = $cart->products;
        $this->totalQuanty = $cart->totalQuanty;
        $this->totaoPrice = $cart->totalPrice;
    }

    public function addCart($product, $id)
    {
        $newProduct = ['quanty' => 0, 'price'=>$this->products ];
    }
}
