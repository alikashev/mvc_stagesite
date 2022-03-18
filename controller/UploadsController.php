<?php

require 'Model/UploadsLogic.php';

class UploadsController {

    public function __construct(){

        $this->UploadsLogic = new UploadsLogic();
    }

    public function __destruct(){}

    public function collectUploadFile($contact_name, $contact_email, $contact_adress) {
        $contacts = $this->ContactsLogic->addContact($contact_name, $contact_email, $contact_adress);
        include 'View/succes.php';
    }

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