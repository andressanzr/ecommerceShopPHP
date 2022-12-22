<?php
require_once "autoloader.php";
require_once "header.php";


?>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="container text-center d-flex flex-column">
        <?php
        if (isset($_GET["productId"])) {
            $prodView = new ProductView();
            $prodView->showProductDetails($_GET["productId"]);
        } else {
            header("Location: /");
        }
        ?>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>