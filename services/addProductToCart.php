<?php
require("../models/cart.php");
require("../controllers/cartController.php");



session_start();
if (isset($_POST["submit"]) && isset($_POST["productId"]) && isset($_SESSION["userId"])) {
    $quantity = 0;
    if (isset($_POST["quantity"])) {
        $quantity = $_POST["quantity"];
    } else {
        $quantity = 1;
    }
    $cartController = new CartController();
    $cartController->addProductToCart($_POST["productId"], $_SESSION["userId"], $quantity);
} else {
    header("Location: ../login.php?error=notLogedIn");
}
