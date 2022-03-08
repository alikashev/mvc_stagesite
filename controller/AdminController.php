<?php

require 'Model/UserLogic.php';

class AdminController {

    public function __construct(){

        $this->UserLogic = new UserLogic();
    }

    public function __destruct(){}

    public function handleRequest(){
        
        try {

            $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;

            switch ($action) {
                case 'create':
                        $this->collectAddContact($_REQUEST['contact_name'], $_REQUEST['contact_email'], $_REQUEST['contact_adress']);
                    break;
                case 'read':
                        $this->collectReadAllUsers();
                    break;
                case 'createform':
                        require 'View/create.php';
                    break;
                case 'readone':
                        $this->collectReadOneContact($_REQUEST['id']);
                     break;
                case 'update':
                        $this->collectUpdateContact($_REQUEST['id']);
                    break;
                case 'delete':
                        $this->collectDeleteContact($_REQUEST['id']);
                    break;
                default:
                        $this->collectReadAllUsers();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }

    }

    public function collectAddContact($contact_name, $contact_email, $contact_adress) {
        $contacts = $this->ContactsLogic->addContact($contact_name, $contact_email, $contact_adress);
        include 'View/succes.php';
    }

    public function collectReadAllUsers() {
        $contacts = $this->UserLogic->readAllUsers();
        include 'view/home.php';
    }

    public function collectReadOneContact($contact_id) {
        $contacts = $this->ContactsLogic->readOneContact($contact_id);
        include 'view/home.php';
    }

    public function collectUpdateContact($id) {
        $contacts = $this->UserLogic->updateContact($id);
        include 'view/AdminView/update.php';
    }
    public function collectDeleteContact($contact_id) {
        $contacts = $this->ContactsLogic->deleteContact($contact_id);
        include 'view/succes.php';
    }
}

?>