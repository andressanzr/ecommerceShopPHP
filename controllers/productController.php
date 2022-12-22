<?php

class ProductController extends Product
{
    public function addProduct($name, $price, $origin, $fotoUrl, $description, $categoryId)
    {
        $this->insertProduct($name, $price, $origin, $fotoUrl, $description, $categoryId);
    }
    public function alterProduct($id, $name, $price, $origin, $fotoUrl, $description, $categoryId)
    {
        $this->updateProduct($id, $name, $price, $origin, $fotoUrl, $description, $categoryId);
    }
    public function retrieveAllProducts()
    {
        return $this->getProducts();
    }
    public function retrieveProductsById($id)
    {
        return $this->getProductById($id);
    }
}
