<?php

require_once "./models/product.php";
require_once "./models/dbInfo.php";

class ProductController extends dbInfo
{
    public function getProducts()
    {
        $sql = "SELECT * FROM PRODUCTS";
        return $stmt = $this->connect()->query($sql);
    }
}
