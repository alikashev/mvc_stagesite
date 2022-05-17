<?php
include_once 'model/User.php';
include_once 'model/Account.php';
require_once 'view/OutputData.php';

class Register
{
  public function __construct()
  {
    $this->User = new User();
    $this->outputData = new OutputData();
  }

  public function Index()
  {
    session_start();
    include_once 'view/register.php';
  }

  public function registerUser()
  {
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstName = $_POST["firstName"];
    $infix = $_POST["infix"];
    $lastName = $_POST["lastName"];
    $phone = $_POST["phone"];
    $school = $_POST["school"];
    $study = $_POST["study"];

    $this->User->addUser($firstName, $infix, $lastName, $email, $password, $phone, 0, 0, 0, 0, 0, 0, $school, $study);
    header('Location: ' . SERVER_URL . '/Home/');
  }
}
