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

    protected function addItemToOrder($orderId, $productId, $quantity)
    {
        $sql = "INSERT INTO order_items(orderId,productId,quantity) values(?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$orderId, $productId, $quantity]);
    }

    protected function getOrderByDateUserId($userId, $date)
    {
        $sql = "SELECT * FROM orders WHERE userId=? AND orderDate=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userId, $date]);
        return $stmt->fetchAll();
    }
    protected function getOrderByUserId($userId)
    {
        $sql = "SELECT * FROM orders WHERE userId=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
    protected function getItemsFromOrderId($orderId)
    {
        $sql = "SELECT * FROM order_items WHERE orderId=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$orderId]);
        return $stmt->fetchAll();
    }
    public function getItemsFromOrderJoinProducts($orderId)
    {
        $sql = "SELECT * FROM order_items INNER JOIN products ON order_items.productId=products.id WHERE orderId=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$orderId]);
        return $stmt;
    }
}
