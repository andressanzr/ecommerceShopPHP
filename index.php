<?php
require_once "autoloader.php";
require_once "header.php";
?>

<body><?php require_once "navbar.php"; ?>

    <div class="container d-flex flex-column text-center mb-5">
        <h1>Our products</h1>
        <div class="row">
            <?php
            $prodCon = new ProductController();
            /* $prodCon->insertProduct("lentils", 2.50, "marocco", "assets/imgs/lentils.webp", "Good tasting lentils", 1);
            $prodCon->insertProduct("chickpeas", 2.99, "spain", "assets/imgs/chickpeas.jpg", "Good chickpeas", 1);
            $prodCon->insertProduct("rice", 0.99, "italia", "assets/imgs/rice.webp", "italian rice", 1);
            $prodCon->insertProduct("white beans", 3.50, "UK", "assets/imgs/white-beans.webp", "Birtish beans", 1);
            */
            $prodView = new ProductView();
            $prodView->showProductsHome();
            ?>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>