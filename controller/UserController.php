<?php

require_once 'model/User.php';
require_once 'model/Account.php';
require_once 'view/OutputData.php';
 
class UserController
{
  public function __construct()
  {

    $this->User = new User();
    $this->outputData = new OutputData();
    $this->Account = new Account(); 
  }


  public function Index()
  {
    self::readAll();
  }

  public function readAll()
  {
    session_start();
    if ($this->Account->adminCheck()) {
      $users = $this->User->readAllUsers();
    } else if ($this->Account->supervisorCheck()) {
      $users = $this->User->supervisorReadAllUsers();
    }  else if ($this->Account->schoolSupervisorCheck()) {
      $users = $this->User->readAllBySchoolName($_SESSION["user"]);
    }
    else {
      header('Location: ' . SERVER_URL . '/Login/');
    }

    $obj = $this->outputData->createTableUsers($users);
    include 'view/content.php';
  }


  public function readOne($id)
  {
    session_start();
    $user = $this->User->readOneUser($id);
    $obj = $this->outputData->createTable($user);
    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);
      include 'view/home.php';
    } else {
      header('Location: ' . SERVER_URL . '/Login/');
    }
  }

  public function create()
  {
    session_start();
    $user = $this->User->readOneUser($_SESSION["user"]);
    if ($this->Account->adminCheck()) {
      include 'view/AdminView/create_user.php';
    } else if ($this->Account->supervisorCheck()) {
      include 'view/SupervisorView/create_user.php';
    } else if ($this->Account->schoolSupervisorCheck()) {
      include 'view/SchoolSupervisorView/create_user.php';
    }
    else {
      header('Location: ' . '/Login/');
    }

    if (isset($_POST["submit"])) {
      $firstName = $_POST["firstName"];
      $infix = $_POST["infix"];
      $lastName = $_POST["lastName"];
      $email = $_POST["email"];
      $password = $_POST["password"] !== '' ? $_POST["password"] : '';
      $phone = $_POST["phone"];
      $isTeacher = !empty($_POST["isTeacher"]) ? 1 : 0;
      $isSupervisor = !empty($_POST["isSupervisor"]) ? 1 : 0;
      $isSchoolSupervisor = !empty($_POST["isSchoolSupervisor"]) ? 1 : 0;
      $isSchoolAccount = !empty($_POST["isSchoolAccount"]) ? 1 : 0;
      $isHumanResources = !empty($_POST["isHumanResources"]) ? 1 : 0;
      $isParent = !empty($_POST["isParent"]) ? 1 : 0;
      $school = $_POST["school"];
      $study = $_POST["study"];

      $this->User->addUser($firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSupervisor, $isSchoolSupervisor, $isSchoolAccount, $isHumanResources, $isParent, $school, $study);
      header('Location: ' . SERVER_URL . '/UserController/readAll');
    }
  }

  public function update($id)
  {
    session_start();
    $obj = $this->User->readOneUser($id);

    if ($this->Account->adminCheck()) {
      include 'view/AdminView/update_user.php';
    } else if ($this->Account->supervisorCheck()) {
      include 'view/SupervisorView/update_user.php';
    } else if ($this->Account->schoolSupervisorCheck()) {
      include 'view/SchoolSupervisorView/update_user.php';
    } else {
        header('Location: ' . SERVER_URL . '/Login/');
    }

    if (isset($_POST["submit"])) {
      $firstName = $_POST["firstName"];
      $infix = $_POST["infix"];
      $lastName = $_POST["lastName"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $phone = $_POST["phone"];
      $isTeacher = !empty($_POST["isTeacher"]) ? 1 : $obj['is_schoolmentor'];
      $isSupervisor = !empty($_POST["isSupervisor"]) ? 1 : $obj['is_praktijkbegeleider'];
      $isSchoolSupervisor = !empty($_POST["isSchoolSupervisor"]) ? 1 : $obj['is_stagebegeleider'];
      $isSchoolAccount = !empty($_POST["isSchoolAccount"]) ? 1 : $obj['is_schoolaccount'];
      $isHumanResources = !empty($_POST["isHumanResources"]) ? 1 : $obj['is_vertrouwenspersoon'];
      $isParent = !empty($_POST["isParent"]) ? 1 : $obj['is_ouder'];

      $school = $_POST["school"];
      $study = $_POST["study"];

      $this->User->updateUser($id, $firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSchoolSupervisor, $isSupervisor, $isSchoolAccount, $isHumanResources, $isParent, $school, $study);
      header('Location: ' . SERVER_URL . '/UserController/readAll');
    }
  }
}