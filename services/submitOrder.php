<?php

require_once "../models/order.php";
require_once "../controllers/orderController.php";

$orderController = new OrderController();
if (isset($_POST[$products])) {
    $res = $orderController->addOrderController(3, [3, 6, 5], "tumblinger 10", "munich", "germany");
}
