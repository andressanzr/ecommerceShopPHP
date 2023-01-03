<?php

session_start();
require_once "autoloader.php";
require_once "header.php";
?>

<body>
    <?php require_once "navbar.php"; ?>
    <div class="container d-flex flex-column text-center mb-5 h-100 mt-5">
        <div class="col-10 offset-1 col-sm-8 col-md-4 offset-md-4 align-center">
            <h1>Delivery Address</h1>
            <form action="services/saveOrder.php" method="post">
                <div class="mb-3">
                    <label for="address" class="form-label">Street and house number</label>
                    <input type="text" class="form-control" name="address_line_1" id="address" required>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" name="city" id="city" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" name="country" id="country" required>
                </div>
                <input type="hidden" name="userAction" value="signUp">
                <button type="submit" class="btn btn-primary">Next Step</button>
            </form>
        </div>
    </div>


</body>