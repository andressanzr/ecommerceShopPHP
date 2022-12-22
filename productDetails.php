<?php
require_once "autoloader.php";
require_once "header.php";
require_once "navbar.php";

?>
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