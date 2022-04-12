<?php
include_once 'model/User.php';
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
    include_once 'view/login.php';
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
        echo "<br>";
        var_dump($_SESSION);
        echo "<br>";
        var_dump($user[0]);
        echo "<br>";
        var_dump($user[0]["id"]);
        echo "<br>";
        if (intval($user[0]["id"]) === 1) {
          echo "Check passed: Admin";
          header('Location: ' . SERVER_URL . '/Admin/');
        } else if (intval($user[0]["is_schoolmentor"]) === 1) {
          header('Location: ../../Teacher/');
          echo "Check passed";
        } else if (intval($user[0]["is_stagebegeleider"]) === 1) {
//          header('Location: ../../SchoolSupervisor/');
          echo "Check passed";
        } else if (intval($user[0]["is_praktijkbegeleider"]) === 1) {
//          header('Location: ../../Supervisor/');
          echo "Check passed";
        } else if (intval($user[0]["is_schoolaccount"]) === 1) {
//          header('Location: ../../School/');
          echo "Check passed";
        } else if (intval($user[0]["is_vertrouwenspersoon"]) === 1) {
//          header('Location: ../../HumanResources/');
          echo "Check passed";
        } else if (intval($user[0]["is_ouder"]) === 1) {
//          header('Location: ../../Parents/');
          echo "Check passed";
        }
      }
    } else {
//      header('Location: ../../Login');
      echo "Check failed";
    }
  }
}
