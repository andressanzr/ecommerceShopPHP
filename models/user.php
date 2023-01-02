<?php
require_once "dbInfo.php";
class User extends dbInfo
{
    protected function checkUserDb($email)
    {
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function login($email, $password)
    {
        $res = $this->checkUserDb($email);
        if ($res) {
            if (password_verify($password, $res["password"])) {
                session_start();
                $_SESSION["email"] = $res["email"];
                $_SESSION["userId"] = $res["id"];
                $_SESSION["name"] = $res["name"];
                return $res;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function insertUser($name, $email, $password, $address_line_1, $city, $country, $phone)
    {
        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(name,email,password,address_line_1,city,country,phone) values(?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $email, $hashedpwd, $address_line_1, $city, $country, $phone]);
    }
}
