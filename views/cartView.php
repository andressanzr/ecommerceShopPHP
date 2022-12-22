<?php

class CartView extends CartController
{

    public function showCart($cardId)
    {
        $res = $this->retrieveProductsFromCart($cardId);
    }
}
