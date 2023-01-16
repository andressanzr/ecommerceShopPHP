<?php
session_start();
require_once "autoloader.php";
require_once "header.php";
require_once "navbar.php";

require_once "services/checkLogin.php";
?>

<body>
    <div class="container d-flex flex-column text-center mb-5">
        <h1>Cart</h1>
        <div class="row">
            <?php
            $cartView = new CartView();
            $cartView->showProductsFromUser($_SESSION["userId"]);

            ?>
        </div>

    </div>
    <div class="container">
        <h3>Order Total</h3>
        <?php
        $cartView = new CartView();
        $cartView->showOrderTotal($_SESSION["userId"]); ?>
        <a href='orderAddress.php'><button class='btn btn-primary'>Continue Order</button></a>

    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>