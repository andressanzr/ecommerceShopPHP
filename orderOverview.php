<?php

session_start();
require_once "autoloader.php";
require_once "header.php";
?>

<body>
    <?php require_once "navbar.php"; ?>
    <div class="container d-flex flex-column text-center align-center mb-5 h-100 mt-5">
        <form action="services/saveOrder.php" method="post">
            <h3>Order Overview</h3>
            <div class="col-12">
                <p>Products:</p>
                <div class="row">
                    <?php
                    $cartView = new CartView();
                    $cartView->showProductsFromUser($_SESSION["userId"])
                    ?>
                </div>
                <h3>Delivery address</h3>
                <?php
                echo "<p>" . $_COOKIE['address_line_1'] . "</p>";
                echo "<p>" . $_COOKIE['city'] . "</p>";
                echo "<p>" . $_COOKIE['country'] . "</p>";
                ?>
                <h3>Payment method:</h3>
                <?php
                echo "<p>" . $_COOKIE["paymentMethod"] . "</p>"
                ?>
                <input type="hidden" name="placeOrder" value="true">
                <h3>Order Total</h3>
                <?php
                $cartView = new CartView();
                $cartView->showOrderTotal($_SESSION["userId"]);
                ?>
                <button class="btn btn-primary" type="submit">Place order</button>
            </div>
        </form>
    </div>
    </div>
</body>