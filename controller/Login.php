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
        $user = $this->User->readOneUser($id);
        var_dump($user);
        var_dump($_SESSION);
        if ($user[0]['id'] === 1) {
          header('Location: ../../Admin/');
        } else if ($user[0]['is_schoolmentor'] === 1) {
          header('Location: ../../Teacher/');
        } else if ($user[0]['is_stagebegeleider'] === 1) {
          header('Location: ../../Admin/');
        } else if ($user[0]['is_praktijkbegeleider'] === 1) {
          header('Location: ../../Admin/');
        } else if ($user[0]['is_schoolaccount'] === 1) {
          header('Location: ../../Admin/');
        } else if ($user[0]['is_vertrouwenspersoon'] === 1) {
          header('Location: ../../Admin/');
        } else if ($user[0]['is_ouder'] === 1) {
          header('Location: ../../Admin/');
        }
      }
    } else {
      header('Location: ../../Login');
    }
  }
}
