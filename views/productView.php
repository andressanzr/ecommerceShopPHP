<?php

class ProductView extends ProductController
{
    public function showProductsHome()
    {
        $res = $this->retrieveAllProducts();
        $out = "";
        while ($row = $res->fetch()) {

            $out .= "<div class='col-8 col-sm-3 mx-5'>
            <h3>" . ucfirst($row['name']) . "</h1>
            <p>" . $row['price'] . "€</p>
            <p>" . ucfirst($row['origin']) . "</p>
            <img src=" . $row['fotoUrl'] . ' alt="" width="200px"  srcset="">
            <a href="./productDetails.php?productId=' . $row['id'] . '"><button class="btn btn-info mt-3">View Details</button></a>
            <button class="btn btn-primary mt-3">Add to cart</button>
            </div>';
        }
        echo $out;
    }
    public function showProductDetails($id)
    {
        $res = $this->retrieveProductsById($id)[0];
        $out = "<h1>Details:</h1><div class='col-10 mx-5'><form action='post' method='post'>
        <h3>" . ucfirst($res['name']) . "</h1>
        <p>" . $res['price'] . "€</p>
        <p>" . ucfirst($res['origin']) . "</p>
        <img src=" . $res['fotoUrl'] . ' alt="" width="200px"  srcset="">
        <a href="productDetails.php"><button class="btn btn-info mt-3">View Details</button></a>
        <button class="btn btn-primary mt-3">Add to cart</button>
            </form>
        </div>';
        echo $out;
    }
}
