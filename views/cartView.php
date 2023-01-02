<?php

class CartView extends CartController
{
    public function showProductsFromUser($userId)
    {
        $products = $this->retrieveProductsFromUser($userId);
        $out = "";
        foreach ($products as $prod) {
            $out .= "<div class='col-12 col-sm-4 d-flex flex-column align-items-center'>
            <form method='post' action='services/removeProductFromCart.php'>
            <img src=" . $prod['fotoUrl'] . ' alt="" width="200px"  srcset="">
            <h3>' .  ucfirst($prod['name']) .
                "</h3><p>Price per unit: " . $prod["price"] . "€</p>
            <p>Quantity: " . $prod["quantity"] . "</p>
            <p><b>Total price: " . $prod["price"] * $prod["quantity"] . "€</b></p>
            <input type='hidden' name='productId' value=" . $prod["cartItemId"] . ">
            <button class='btn btn-danger'>Delete</button>
            </form>
            </div>";
        }
        echo $out;
    }
    public function showOrderTotal($userId)
    {
        $products = $this->retrieveProductsFromUser($userId);
        $total = 0;
        foreach ($products as $prod) {
            $total += $prod["price"] * $prod["quantity"];
        }
        $out = "<div><p><b>" . $total . "€</b></p><button class='btn btn-primary'>Continue Order</button></div>";
        echo $out;
    }
}
