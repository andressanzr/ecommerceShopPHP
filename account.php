<?php
session_start();
require_once "autoloader.php";
require_once "header.php";
require_once "navbar.php";

?>

<body>
    <div class="container d-flex flex-column text-center mb-5">
        <h1>My Orders</h1>
        <div class="row">
            <?php //print user orders 
            if (isset($_SESSION["userId"])) {
                $orderView = new OrderView();
                $orderView->showOrdersUser($_SESSION["userId"]);
            } else {
                echo "Not logged in";
            }

            ?>
        </div>
    </div>
</body>