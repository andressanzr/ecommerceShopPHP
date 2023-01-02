<?php
class CartController extends Cart
{

    protected function addCart($userId)
    {
        $this->insertCart($userId);
    }
    public function addProductToCart($productId,  $userId, $quantity)
    {
        $userCart = $this->getUserCart($userId)[0];

        if (is_null($userCart)) {
            $this->addCart($userId);
            $cartUser = $this->retrieveUserCart($userId)[0];
            $this->insertProductToCart($productId, $cartUser['id'], $userId, $quantity);
            header("Location: ../index.php?productInserted=1");
        } else {
            //check if user already has the product in the cart
            $prod = $this->retrieveSingleProductFromCart($userCart['id'], $productId)[0];
            if (is_null($prod)) {
                $this->insertProductToCart($productId, $userCart['id'], $userId, $quantity);
                header("Location: ../index.php?productInserted=quantity0");
            } else {
                $newQuantity = $prod["quantity"] + $quantity;
                $this->updateQuantityFromProduct($userCart['id'], $productId, $newQuantity);
                header("Location: ../index.php?quantity=$newQuantity");
            }
        }
    }
    public function removeProductFromCartItems($productId)
    {
        $this->removeProductFromCart($productId);
        header("Location: cart.php");
    }
    protected function retrieveCartById($id)
    {
        return $this->getCartById($id);
    }
    protected function retrieveUserCart($userId)
    {
        return $this->getUserCart($userId);
    }
    protected function retrieveProductsFromCart($cardId)
    {
        return $this->getProductsFromCart($cardId);
    }
    protected function retrieveProductsFromUser($userId)
    {
        return $this->getProductsFromUser($userId);
    }
    protected function retrieveSingleProductFromCart($cardId, $productId)
    {
        return $this->getProductFromCart($cardId, $productId);
    }
    protected function updateQuantityFromProduct($cartId, $productId, $quantity)
    {
        return $this->updateQuantityProduct($cartId, $productId, $quantity);
    }
}
