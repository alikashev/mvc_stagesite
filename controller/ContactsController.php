<?php

require 'Model/ContactsLogic.php';

class ContactsController {

    public function __construct(){

        $this->ContactsLogic = new ContactsLogic();
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
                        $this->collectReadAllContacts();
                    break;
                case 'createform':
                        require 'View/create.php';
                    break;
                case 'readone':
                        $this->collectReadOneContact($_REQUEST['contact_id']);
                     break;
                case 'update':
                        $this->collectUpdateContact($_REQUEST['contact_id']);
                    break;
                case 'delete':
                        $this->collectDeleteContact($_REQUEST['contact_id']);
                    break;
                default:
                        $this->collectReadAllContacts();
                    break;
            }
        } catch (Exeption $e) {
            throw $e;
        }

    }

    public function collectAddContact($contact_name, $contact_email, $contact_adress) {
        $contacts = $this->ContactsLogic->addContact($contact_name, $contact_email, $contact_adress);
        include 'View/succes.php';
    }

    public function collectReadAllContacts() {
        $contacts = $this->ContactsLogic->readAllContacts();
        include 'view/home.php';
    }

    public function collectReadOneContact($contact_id) {
        $contacts = $this->ContactsLogic->readOneContact($contact_id);
        include 'view/home.php';
    }

    public function collectUpdateContact($contact_id) {
        $contacts = $this->ContactsLogic->updateContact($contact_id);
        include 'view/update.php';
    }
    public function collectDeleteContact($contact_id) {
        $contacts = $this->ContactsLogic->deleteContact($contact_id);
        include 'view/succes.php';
    }
}

?>