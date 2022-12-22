<?php

class CartController extends Cart
{

    public function addCart($userId)
    {
        $this->insertCart($userId);
    }
    public function addProductToCart($productId, $cartId,  $userId, $quantity)
    {
        $this->insertProductToCart($productId, $cartId,  $userId, $quantity);
    }

    public function retrieveCartById($id)
    {
        return $this->getCartById($id);
    }
    public function retrieveProductsFromCart($cardId)
    {
        return $this->getProductsFromCart($cardId);
    }
}
