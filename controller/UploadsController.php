<?php

require 'model/UploadsLogic.php';

class UploadsController {

    public function __construct(){

        $this->UploadsLogic = new UploadsLogic();
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
                        $this->collectReadAllFiles();
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
                        $this->collectReadAllFiles();
                    break;
            }
        } catch (Exeption $e) {
            throw $e;
        }

    }

    // public function collectAddContact($contact_name, $contact_email, $contact_adress) {
    //     $contacts = $this->ContactsLogic->addContact($contact_name, $contact_email, $contact_adress);
    //     include 'View/succes.php';
    // }

    public function collectReadAllFiles() {
        $uploads = $this->UploadsLogic->readAllFiles();
        include 'view/home.php';
    }

    // public function collectReadOneContact($contact_id) {
    //     $contacts = $this->ContactsLogic->readOneContact($contact_id);
    //     include 'view/home.php';
    // }

    // public function collectUpdateContact($contact_id) {
    //     $contacts = $this->ContactsLogic->updateContact($contact_id);
    //     include 'view/update.php';
    // }
    // public function collectDeleteContact($contact_id) {
    //     $contacts = $this->ContactsLogic->deleteContact($contact_id);
    //     include 'view/succes.php';
    // }
}

?>