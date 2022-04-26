<?php
include_once 'model/User.php';
require_once 'view/OutputData.php';

class Logout
{
  public function __construct()
  {
    $this->User = new User();
    $this->OutputData = new OutputData();
  }

  public function Index()
  {
    session_start();
    if(isset($_SESSION["user"])) {
      session_destroy();
    }
    header('Location: ' . SERVER_URL);
  }
}
