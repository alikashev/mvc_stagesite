<?php
include_once 'Model/User.php';
require_once 'View/outputData.php';

class Login
{
  public function __construct()
  {
    $this->User = new User();
    $this->outputData = new OutputData();
  }

  public function Index()
  {
    include_once 'View/login.php';
  }

  public function checkLogin()
  {
    var_dump($_POST);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $this->User->readOneUserByEmail($email);
    $user = $user[0];
    if (empty($user->wachtwoord_hash)) {
      return false;
    } else {
      if ($user) {
        if (password_verify($password, $user->wachtwoord_hash)) {
          header('Location: ../checkAccountType/' . $user->id);
        } else {
          return false;
        }
      }
    }
  }

  public function checkaccountType($id)
  {
    $user = $this->User->readOneUser($id);
    var_dump($user);
  }
}
