<?php
include_once 'model/User.php';
include_once 'model/Account.php';
require_once 'view/OutputData.php';

class Login
{
    public function __construct()
    {
        $this->User = new User();
        $this->outputData = new OutputData();
    }

    public function Index()
    {
        session_start();
        include_once 'view/login.php';
        if (isset($_SESSION["user"])) {
            var_dump($_SESSION);
            header('Location: ' . SERVER_URL . '/Login/checkAccountType/' . $_SESSION["user"]);
        }
    }

    public function checkLogin()
    {
        session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->User->readOneUserByEmail($email);
        $user = $user[0];
        if (empty($user->wachtwoord_hash)) {
            return false;
        } else {
            if ($user) {
                if (password_verify($password, $user->wachtwoord_hash)) {
                    $_SESSION['user'] = $user->id;
                    header('Location: ../checkAccountType/' . $user->id);
                } else {
                    return false;
                }
            }
        }
    }

    public function checkAccountType($id)
    {
        session_start();
        if (!empty($_SESSION["user"])) {
            if ($_SESSION["user"] !== 0) {
                header('Location: ' . SERVER_URL . '/');
            } else {
                header('Location: ' . SERVER_URL . '/Login/');
            }
        }
    }
}
