<?php

require 'Model/User.php';

class Admin {

    public function __construct(){

        $this->User = new User();
    }

    public function __destruct(){}

    public function handleRequest(){
        
        try {

            $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;

            switch ($action) {
                case 'create_user':
                        $this->collectAddUser($_REQUEST["firstName"], $_REQUEST["infix"], $_REQUEST["lastName"], $_REQUEST["email"], $_REQUEST["password"], $_REQUEST["phone"], $_REQUEST["isTeacher"], $_REQUEST["isSupervisor"], $_REQUEST["school"], $_REQUEST["study"]);
                    break;
                case 'read_user':
                        $this->collectReadAllUsers();
                    break;
                case 'createform':
                        require 'View/create.php';
                    break;
                case 'readone_user':
                        $this->collectReadOneUser($_REQUEST['id']);
                     break;
                case 'update_user':
                        $this->collectUpdateUser($_REQUEST['id']);
                    break;
                case 'delete_user':
                        $this->collectDeleteUser($_REQUEST['id']);
                    break;
                default:
                        $this->collectReadAllUsers();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }

    }

    public function collectAddUser($firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSupervisor, $school, $study) {
        $obj = $this->User->addUser($firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSupervisor, $school, $study);
        include 'View/succes.php';
    }

    public function collectReadAllUsers() {
        $obj = $this->User->readAllUsers();
        include 'view/home.php';
    }

    public function collectReadOneUser($id) {
        $obj = $this->User->readOneUser($id);
        var_dump($obj);
        include 'view/home.php';
    }

    public function collectUpdateUser($id) {
        $obj = $this->User->updateUser($id);
        include 'view/AdminView/update_user.php';
    }
    public function collectDeleteUser($id) {
        $obj = $this->User->deleteUser($id);
        include 'view/succes.php';
    }
}

?>