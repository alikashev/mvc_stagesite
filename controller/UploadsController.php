<?php

require_once 'model/UploadsLogic.php';
require_once 'model/Account.php';
require_once 'model/User.php';

// if (isset($_POST["submit"]) {
//     $filename = $_REQUEST['filename'];
//     $file = $_REQUEST['file']; 
// }

class UploadsController
{

  public function __construct()
  {
    $this->UploadsLogic = new UploadsLogic();
    $this->Account = new Account();
    $this->User = new User();
  }

  public function Index()
  {
    self::collectReadAllFiles();
  }

  public function __destruct()
  {
  }

  // public function collectUploadFile($filename, $file) {
  //     $uploads = $this->ContactsLogic->uploadFile($filename, $file);
  //     include 'View/succes.php';
  // }

  public function collectReadAllFiles()
  {
    session_start();
    if (!$this->Account->adminCheck() && !$this->Account->supervisorCheck() && !$this->Account->schoolSupervisorCheck()) {
      header('Location: ' . SERVER_URL . '/Home/');
      return false;
    }

    $obj = $this->UploadsLogic->readAllFiles();
    include 'view/content.php';
    return true;
  }

  public function collectUploadFile()
  {
    session_start();
    if (!$this->Account->adminCheck() && !$this->Account->supervisorCheck() && !$this->Account->schoolSupervisorCheck()) {
      header('Location: ' . SERVER_URL . '/Home/');
    }
    if (isset($_POST["submit"])) {

      $filedesc = $_POST['filedesc'];

      $obj = $this->UploadsLogic->uploadFile($filedesc);
      header("Location: ./collectReadAllFiles/");
    }
  }

  public function uploadForm()
  {
    session_start();
    if (!$this->Account->adminCheck() && !$this->Account->supervisorCheck() && !$this->Account->schoolSupervisorCheck()) {
      header('Location: ' . SERVER_URL . '/Home/');
    }
    include 'view/UploadView/file_upload.php';
  }

  public function collectDeleteFile($id)
  {
    $obj = $this->UploadsLogic->deleteFile($id);
  }

  public function collectReadFile($id)
  {
    $obj = $this->UploadsLogic->readFile($id);
  }

  // public function collectUpdateContact($contact_id) {
  //     $contacts = $this->ContactsLogic->updateContact($contact_id);
  //     include 'view/update.php';
  // }
}

?>