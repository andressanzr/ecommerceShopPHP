<?php
require_once "autoloader.php";
require_once "header.php";

?>

<body>
    <?php require_once "navbar.php"; ?>
    <div class="container d-flex flex-column text-center mb-5 h-100 mt-5">
        <div class="col-10 offset-1 col-sm-8 col-md-4 offset-md-4 align-center">
            <h1>Login</h1>
            <?php if (isset($_GET["error"])) {
                $msg;
                switch ($_GET["error"]) {
                    case "emptyInput":
                        $msg = "Empty fields";
                        break;
                    case "loginFailed":
                        $msg = "Username or password not matching";
                        break;
                    case "notLogedIn":
                        $msg = "Please Login or register";
                        break;
                }
                echo "<p style=\"color:red\">$msg!</p>";
            } ?>
            <form action="controllers/userController.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                </div>
                <input type="hidden" name="userAction" value="login">

                <button type="submit" class="btn btn-primary">Login</button>
                <p>Don´t have an account yet <a href="signUp.php">Sign Up</a></p>
            </form>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>