<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Online Supermarket</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Grains</a></li>
                        <li><a class="dropdown-item" href="#">Spices</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Coffee</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <a class="text-dark" href="cart.php"><i class="fa-solid fa-cart-shopping p-2" style="font-size: 2rem;"></i></a>
                <?php if (isset($_SESSION["userId"])) {
                    echo '<a class="text-dark" href="account.php"><i class="fa-solid fa-user p-2" style="font-size: 2rem;"> </i></a>';
                } else {
                    echo '<a class="text-dark" href="login.php"><i class="fa-solid fa-user p-2" style="font-size: 2rem;"> </i></a>';
                }
                ?>
                <?php if (isset($_SESSION["userId"])) echo '<li class="nav-item"><a class="nav-link"  href="logout.php">Logout</a></li>'; ?>
            </ul>
        </div>
    </div>
</nav>