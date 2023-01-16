<?php

class ProductView extends ProductController
{
    public function showProductsHome()
    {
        $res = $this->retrieveAllProducts();
        $out = "";
        while ($row = $res->fetch()) {

            $out .= "<div class='col-12 col-sm-4 d-flex flex-column align-items-center'><form action='services/addProductToCart.php' method='post'>
            <h3>" . ucfirst($row['name']) . "</h1>
            <p>" . $row['price'] . "€</p>
            <p>" . ucfirst($row['origin']) . "</p>
            <img src=" . $row['fotoUrl'] . ' alt="" width="200px"  srcset="">
            
            <input type="number" class="form-control mt-2" name="quantity" id="number" min="1" value="1">
            <input type="hidden" name="productId" value="' . $row['id'] . '">
            <input type="hidden" name="submit" value="true">
            <p><button class="btn btn-primary mt-3">Add to cart</button></p>
            </form><a href="./productDetails.php?productId=' . $row['id'] . '"><button class="btn btn-info mt-3">View Details</button></a></div>';
        }
        echo $out;
    }
    public function showProductDetails($id)
    {
        $res = $this->retrieveProductsById($id);

        $out = "";
        if (count($res) <= 0) {
            $out = "<div class='col-12 mt-3'><h1>Details:</h1><h3>Product doesn´t exist</h3></div>";
        } else {
            $row = $res[0];
            $out = "<div class='col-12 mt-3'><h1>Details:</h1><form action='post' method='post'>
            <h3>" . ucfirst($row['name']) . "</h1>
            <p>" . $row['price'] . "€</p>
            <p>" . ucfirst($row['origin']) . "</p>
            <img src=" . $row['fotoUrl'] . ' alt="" width="200px"  srcset="">
            <p><button class="btn btn-primary mt-3">Add to cart</button></p>
                </form>
            </div>';
        }

        echo $out;
    }
}
