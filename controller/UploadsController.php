<?php

require 'model/UploadsLogic.php';

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
        $obj = $this->UploadsLogic->readAllFiles();
        include 'view/content.php';
    }

    public function collectUploadFile() {
        if(isset($_POST["submit"])) {

            $filedesc = $_POST['filedesc'];

            $obj = $this->UploadsLogic->uploadFile($filedesc);
            header("Location: " . SERVER_URL . "/Home/");
        }
    }

    public function uploadForm() {
        include 'view/UploadView/file_upload.php';
    }

    public function collectDeleteFile($id) {
        $obj = $this->UploadsLogic->deleteFile($id);
    }

    public function collectReadFile($id) {
        $obj = $this->UploadsLogic->readFile($id);
    }

    // public function collectUpdateContact($contact_id) {
    //     $contacts = $this->ContactsLogic->updateContact($contact_id);
    //     include 'view/update.php';
    // }
}

?>