<?php

require_once 'Model/User.php';
require_once 'View/outputData.php';

class Admin {

    public function __construct(){

        $this->User = new User();
        $this->outputData = new OutputData();
    }

    public function __destruct(){}

    public function Default() {
        header("Location: collectReadAllUsers");
    }

    public function collectAddUser() {
        include 'view/AdminView/create_user.php';
        if (isset($_POST["submit"]))
        {
            $firstName = $_POST["firstName"];
            $infix = $_POST["infix"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $password = $_POST["password"] !== '' ? $_POST["password"] : '';
            $phone = $_POST["phone"];
            $isTeacher = !empty($_POST["isTeacher"]) ? 1 : 0;
            $isSupervisor = !empty($_POST["isSupervisor"]) ? 1 : 0;
            $school = $_POST["school"];
            $study = $_POST["study"];

            var_dump($_POST);
            $this->User->addUser($firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSupervisor, $school, $study);
            header("Location: collectReadAllUsers/");
        }
    }

    public function collectReadAllUsers() {
        $users = $this->User->readAllUsers();
        $obj = $this->outputData->createTableAdmin($users);
        include 'view/home.php';
    }

    public function collectReadOneUser($id) {
        $user = $this->User->readOneUser($id);
        var_dump($user);
        $obj = $this->outputData->createTableAdmin($user);
        include 'view/home.php';
    }

    public function collectUpdateUser($id) {
        $obj = $this->User->readOneUser($id);
        include 'view/AdminView/update_user.php';
        if(isset($_POST["submit"])) {
            $firstName = $_POST["firstName"];
            $infix = $_POST["infix"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $phone = $_POST["phone"];
            $isTeacher = !empty($_POST["isTeacher"]) ? 1 : 0;
            $isSupervisor = !empty($_POST["isSupervisor"]) ? 1 : 0;
            $school = $_POST["school"];
            $study = $_POST["study"];

            $this->User->updateUser($id, $firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSupervisor, $school, $study);
            header("Location: ../collectReadAllUsers/");
        }
    }
    public function collectDeleteUser($id) {
        $obj = $this->User->deleteUser($id);
        include 'view/succes.php';
    }
}

?>