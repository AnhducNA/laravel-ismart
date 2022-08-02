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
        if (!empty($this->products[$id])) {
            $this->totalPrice -= ($this->products[$id]['price']);
            $this->totalQuanty -= $this->products[$id]['quanty'];
            unset($this->products[$id]);
        } else {
            echo "Not exit product !";
        }
        if (count($this->products) == 0) {
            $this->totalPrice = 0;
            $this->totalQuanty = 0;
        }
    }
    public function changeQtyItemListCart($id, $quanty)
    {
        if ($quanty > $this->products[$id]['quanty']) {
            $this->totalQuanty += abs($quanty - $this->products[$id]['quanty']);
            $this->totalPrice += abs(($quanty * $this->products[$id]['productInfo']->new_price) - $this->products[$id]['price']);
            $this->products[$id]['quanty'] = $quanty;
            $this->products[$id]['price'] = $quanty * $this->products[$id]['productInfo']->new_price;
        } else if ($quanty < $this->products[$id]['quanty']) {
            $this->totalQuanty -= abs($quanty - $this->products[$id]['quanty']);
            $this->totalPrice -= abs(($quanty * $this->products[$id]['productInfo']->new_price) - $this->products[$id]['price']);
            $this->products[$id]['quanty'] = $quanty;
            $this->products[$id]['price'] = $quanty * $this->products[$id]['productInfo']->new_price;
        } else {
            $this->products[$id]['quanty'] = $quanty;
            $this->products[$id]['price'] = $quanty * $this->products[$id]['productInfo']->new_price;
        }
    }
    public function deleteAllListCart()
    {
        $this->totalPrice = 0;
        $this->totalQuanty = 0;
        $this->products = null;
    }
}
