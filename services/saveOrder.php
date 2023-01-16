<?php
session_start();
require_once "../models/order.php";
require_once "../controllers/orderController.php";
require_once "../models/cart.php";
require_once "../controllers/cartController.php";

if (isset($_POST["address_line_1"]) && isset($_POST["city"]) && isset($_POST["country"]) && isset($_SESSION["userId"])) {
    $orderController = new OrderController();
    $orderController->saveAddressCookie($_POST["address_line_1"], $_POST["city"], $_POST["country"]);
    header("Location: ../payment.php");
} else if (isset($_POST["paymentMethod"])) {
    $orderController = new OrderController();
    $orderController->savePaymentCookie($_POST["paymentMethod"]);
    header("Location: ../orderOverview.php");
} else if (isset($_POST["placeOrder"])) {
    $orderController = new OrderController();
    $cartController = new CartController();
    $address_line_1 = $_COOKIE['address_line_1'];
    $city = $_COOKIE['city'];
    $country = $_COOKIE['country'];
    $paymentMethod = $_COOKIE['paymentMethod'];
    $products = $cartController->getCartItemsFromUser($_SESSION["userId"]);




    $orderController->addOrderDao($_SESSION["userId"], $products, $address_line_1, $city, $country, $paymentMethod);
    //$cartController->clearCart($_SESSION["userId"]);
    //$orderController->clearOrderCookies();
    header("Location: ../index.php?orderPlaces=true");

    // clear user cart
}
