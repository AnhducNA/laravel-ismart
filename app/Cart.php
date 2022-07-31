<?php

namespace App;



class Cart
{
    public $products = null;
    public $totalQuanty = 0;
    public $totalPrice = 0;

    function __construct($cart)
    {
        if (isset($cart)) {
            $this->products = $cart->products;
            $this->totalQuanty = $cart->totalQuanty;
            $this->totalPrice = $cart->totalPrice;
        }
    }

    public function addCart($product, $id)
    {
        $newProduct = ['quanty' => 0, 'price' => $product->new_price, 'productInfo' => $product];
        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price'] = $newProduct['quanty'] * $product->new_price;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->new_price;
        $this->totalQuanty++;
    }
    public function deleteItemCart($id)
    {
        $this->totalPrice -= ($this->products[$id]['price']);
        $this->totalQuanty -= $this->products[$id]['quanty'];
        unset($this->products[$id]);
    }
}
