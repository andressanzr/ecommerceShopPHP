<?php

class OrderView extends OrderController
{
    public function showOrdersUser($userId)
    {
        $orders = $this->getOrdersFromUser($userId);
        $out = "";
        foreach ($orders as $order) {
            $products = $this->getOrderItemsDetails($order["id"]);
            $out .= "<div class='container d-flex flex-column text-center mb-5'><div class='row'><h3>Order Id: " . $order["id"] . "</h3><p>Date: " . $order["orderDate"] . "</p>";
            foreach ($products as $prod) {
                $out .= "<div class='col-12 col-sm-4 d-flex flex-column align-items-center'>
                <h3>" . ucfirst($prod['name']) . "</h3>
                <p>" . $prod['price'] . "€</p>
                <p>Quantity: " . $prod['quantity'] . "</p>
                <p>" . ucfirst($prod['origin']) . "</p>
                <img src=" . $prod['fotoUrl'] . ' alt="" width="200px"  srcset="">
                </div>';
            }
            $out .= "</div></div>";
        }
        echo $out;
    }
}
