<?php
require("../models/cart.php");
require("../controllers/cartController.php");

session_start();

if (isset($_POST["productId"])) {
    $cartController = new CartController();
    $cartController->removeProductFromCartItems($_POST["productId"]);
}
