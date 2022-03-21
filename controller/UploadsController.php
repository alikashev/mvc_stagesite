<?php

require 'Model/UploadsLogic.php';

// if (isset($_POST["submit"]) {
//     $filename = $_REQUEST['filename'];
//     $file = $_REQUEST['file']; 
// }

class UploadsController {

    public function __construct(){

        $this->UploadsLogic = new UploadsLogic();
    }

    public function __destruct(){}

    // public function collectUploadFile($filename, $file) {
    //     $uploads = $this->ContactsLogic->uploadFile($filename, $file);
    //     include 'View/succes.php';
    // }

    public function collectReadAllFiles() {
        $uploads = $this->UploadsLogic->readAllFiles();
        include 'view/home.php';
    }

    public function collectUploadFile() {
        if(isset($_POST["submit"])) {

            $filedesc = $_POST['filedesc'];
            $uploads = $this->UploadsLogic->uploadFile($filedesc);

        }
    }

    public function uploadForm() {
        include 'view/UploadView/file_upload.php';
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