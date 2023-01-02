<?php
//var_dump($_SERVER);
require_once "../models/user.php";
require_once "../views/userView.php";

class UserController extends User
{
    public function loginUser($email, $password)
    {
        if (strlen($email) <= 0 || strlen($password) <= 0) {
            header("Location: ../login.php?error=emptyInput");
        } else {
            $res = $this->login($email, $password);
            if ($res) {
                header("Location: ../index.php?info=logedIn");
            } else {
                header("Location: ../login.php?error=loginFailed");
            }
        }
    }
    public function signUpUser($name, $email, $password)
    {
        $this->insertUser($name, $email, $password, "", "", "", "");
        header("Location: ../index.php?info=signedup");
    }
}
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["name"]) && $_POST["userAction"] == "signUp") {
    $userControl = new UserController();
    $userControl->signUpUser($_POST["name"], $_POST["email"], $_POST["password"]);
} else if (isset($_POST["email"]) && isset($_POST["password"]) && $_POST["userAction"] == "login") {
    $userControl = new UserController();
    $userControl->loginUser($_POST["email"], $_POST["password"]);
}
