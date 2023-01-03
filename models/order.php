<?php
require_once "dbInfo.php";
class Order extends dbInfo
{

    protected function addOrder($userId, $orderDate, $address_line_1, $city, $country, $payment_method)
    {
        $sql = "INSERT INTO orders(userId,orderDate,address_line_1,city,country,payment_method) values(?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$userId, $orderDate, $address_line_1, $city, $country, $payment_method]);
    }

    protected function addItemsToOrder($orderId, $productId)
    {
        $sql = "INSERT INTO order_items(orderId,productId) values(?,?)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$orderId, $productId]);
    }

    protected function getOrderByDateUserId($userId, $date)
    {
        $sql = "SELECT * FROM orders WHERE userId=? AND orderDate=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userId, $date]);
        return $stmt->fetchAll();
    }
}
