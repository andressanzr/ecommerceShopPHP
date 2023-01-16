<?php
require_once "dbInfo.php";

class Cart extends dbInfo
{

    protected function getCartById($id)
    {
        $sql = "SELECT * FROM carts WHERE id=$id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam("i", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getUserCart($userId)
    {
        $sql = "SELECT * FROM carts WHERE userId=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
    public function getProductsFromCart($cartId)
    {
        $sql = "SELECT * FROM cart_items WHERE cartId=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$cartId]);
        return $stmt;
    }
    public function getProductsFromUser($userId)
    {
        $sql = "SELECT *,cart_items.id as cartItemId FROM cart_items INNER JOIN products ON cart_items.productId=products.id WHERE userId=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt;
    }
    public function getProdIdFromUser($userId)
    {
        $sql = "SELECT productId FROM cart_items WHERE userId=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_NUM);
    }
    public function getCartItemsFromUser($userId)
    {
        $sql = "SELECT * FROM cart_items WHERE userId=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_NUM);
    }
    protected function getProductFromCart($cartId, $productId)
    {
        $sql = "SELECT * FROM cart_items WHERE cartId=? AND productId=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$cartId, $productId]);
        return $stmt->fetchAll();
    }
    protected function insertCart($userId)
    {
        $sql = "INSERT INTO carts(userId) values(?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchObject();
    }
    protected function insertProductToCart($productId, $cartId,  $userId, $quantity)
    {
        $sql = "INSERT INTO cart_items(productId,cartId,userId,quantity) values(?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$productId, $cartId,  $userId, $quantity]);
    }
    protected function updateQuantityProduct($cartId, $productId, $quantity)
    {
        $sql = "UPDATE cart_items SET quantity=? WHERE cartId = ? AND productId=?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$quantity, $cartId, $productId]);
    }
    protected function removeProductFromCart($productId)
    {
        $sql = "DELETE FROM cart_items WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$productId]);
    }
    protected function removeUserCartItemsFrom($userId)
    {
        $sql = "DELETE FROM cart_items WHERE userId=?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$userId]);
    }
    protected function removeUserCart($userId)
    {
        $sql = "DELETE FROM carts WHERE userId=?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$userId]);
    }

    /*
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
    */
}
