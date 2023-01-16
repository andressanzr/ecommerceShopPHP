<?php

session_start();
require_once "autoloader.php";
require_once "header.php";


?>

<body>
    <?php require_once "navbar.php"; ?>
    <div class="container d-flex flex-column text-center mb-5 h-100 mt-5">
        <div class="col-10 offset-1 col-sm-8 col-md-4 offset-md-4 align-center">
            <form action="services/saveOrder.php" method="post">
                <h1>Payment Method</h1>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentMethod" value="Credit Card" id="radio1">
                    <h4><label class="form-check-label" for="radio1">
                            Credit Card <i class="fa-solid fa-credit-card"></i>
                        </label></h4>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentMethod" value="Paypal" id="radio2">
                    <h4><label class="form-check-label" for="radio2">
                            Paypal <i class="fa-brands fa-paypal"></i>
                        </label></h4>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentMethod" value="Bank Transfer" id="radio3">
                    <h4><label class="form-check-label" for="radio3">
                            Bank Transfer <i class="fa-solid fa-building-columns"></i>
                        </label></h4>
                </div>
                <button type="submit" class="btn btn-primary">Next Step</button>
            </form>
        </div>
    </div>

</body>