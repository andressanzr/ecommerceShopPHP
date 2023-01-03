<?php

class OrderController extends Order
{

    public function addOrderDao($userId, $products, $address_line_1, $city, $country, $payment_method)
    {
        $orderDate = date('Y-m-d H:i:s');
        $this->addOrder($userId, $orderDate, $address_line_1, $city, $country, $payment_method);
        $orderId = $this->getOrderByDateUserId($userId, $orderDate)[0]["id"];
        foreach ($products as $prod) {
            $this->addItemsToOrder($orderId, $prod);
        }
        return true;
    }
    public function saveAddressCookie($address_line_1, $city, $country)
    {
        setcookie("address_line_1", $address_line_1, time() + 86400, "/");
        setcookie("city", $city, time() + 86400, "/");
        setcookie("country", $country, time() + 86400, "/");
    }
    public function savePaymentCookie($paymentMethod)
    {
        setcookie("paymentMethod", $paymentMethod, time() + 86400, "/");
    }
    public function clearOrderCookies()
    {
        setcookie("address_line_1", "", time() - 3600, "/");
        setcookie("city", "", time() - 3600, "/");
        setcookie("country", "", time() - 3600, "/");
        setcookie("paymentMethod", "", time() - 3600, "/");
        unset($_COOKIE["address_line_1"]);
        unset($_COOKIE["city"]);
        unset($_COOKIE["country"]);
        unset($_COOKIE["paymentMethod"]);
    }
}
