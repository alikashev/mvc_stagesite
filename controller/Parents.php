<?php

require_once 'Model/User.php';
require_once 'Model/Contract.php';
require_once 'Model/Company.php';
require_once 'View/outputData.php';

class Parents
{

  public function __construct()
  {

    $this->User = new User();
    $this->Contract = new Contract();
    $this->Company = new Company();
    $this->outputData = new OutputData();
  }

  public function __destruct()
  {
  }

  public function Index()
  {
    session_start();
    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if ($user[0]['is_ouder'] === 1) {
        var_dump($user);
        die('testing');
      } else {
        header('Location: ' . SERVER_URL . '/login');
      }
    } else {
      header('Location: ' . SERVER_URL . '/login');
    }
  }
}

?>