<?php

class ProductController extends Product
{
    protected function addProduct($name, $price, $origin, $fotoUrl, $description, $categoryId)
    {
        $this->insertProduct($name, $price, $origin, $fotoUrl, $description, $categoryId);
    }
    protected function alterProduct($id, $name, $price, $origin, $fotoUrl, $description, $categoryId)
    {
        $this->updateProduct($id, $name, $price, $origin, $fotoUrl, $description, $categoryId);
    }
    protected function retrieveAllProducts()
    {
        return $this->getProducts();
    }
    protected function retrieveProductsById($id)
    {
        return $this->getProductById($id);
    }
}
