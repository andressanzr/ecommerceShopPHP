<?php
require_once "dbInfo.php";
class Product extends dbInfo
{
    private $id, $name, $price, $origin, $fotoUrl, $description, $categoryId;
    /*
    protected function __construct($name, $price, $origin, $fotoUrl, $description, $categoryId)
    {
        $this->name = $name;
        $this->price = $price;
        $this->origin = $origin;
        $this->fotoUrl = $fotoUrl;
        $this->description = $description;
        $this->categoryId = $categoryId;
    }
*/
    protected function getProducts()
    {
        $sql = "SELECT * FROM PRODUCTS";
        return $stmt = $this->connect()->query($sql);
    }
    protected function getProductById($id)
    {
        $sql = "SELECT * FROM PRODUCTS WHERE id=$id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam("i", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    protected function getProductsFromCategroy($categoryId)
    {
        $sql = "SELECT * FROM PRODUCTS WHERE categoryId=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($categoryId);
        return $stmt;
    }
    protected function insertProduct($name, $price, $origin, $fotoUrl, $description, $categoryId)
    {
        $sql = "INSERT INTO products(name,price,origin,fotoUrl,description,categoryId) values(?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $price, $origin, $fotoUrl, $description, $categoryId]);
    }
    protected function updateProduct($id, $name, $price, $origin, $fotoUrl, $description, $categoryId)
    {
        $sql = "UPDATE products SET name = ?, price= ?,origin=?,fotoUrl=?,description=?,categoryId=? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $price, $origin, $fotoUrl, $description, $categoryId, $id]);
    }
    protected function removeProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$id]);
    }
}
