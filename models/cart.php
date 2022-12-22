<?php

class Cart extends dbInfo
{

    public function getCartById($id)
    {
        $sql = "SELECT * FROM carts WHERE id=$id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam("i", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getProductsFromCart($cartId)
    {
        $sql = "SELECT * FROM cart_items INNER JOIN carts ON cart_items.cartId=carts.id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($cartId);
        return $stmt;
    }
    public function insertCart($userId)
    {
        $sql = "INSERT INTO carts(userId) values(?)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$userId]);
    }
    public function insertProductToCart($productId, $cartId,  $userId, $quantity)
    {
        $sql = "INSERT INTO cart_items(productId,cartId,userId,quantity) values(?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$productId, $cartId,  $userId, $quantity]);
    }
    /*
    public function updateProduct($id, $name, $price, $origin, $fotoUrl, $description, $categoryId)
    {
        $sql = "UPDATE products SET name = ?, price= ?,origin=?,fotoUrl=?,description=?,categoryId=? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $price, $origin, $fotoUrl, $description, $categoryId, $id]);
    }
    public function removeProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$id]);
    }
    */
}
