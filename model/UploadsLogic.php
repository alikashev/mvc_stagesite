<?php

require_once 'model/DataHandler.php';
require_once 'model/Main.php';
require_once 'view/OutputData.php';

class UploadsLogic extends Main
{

  function __construct()
  {
    parent::__construct();
  }

  public function uploadFile($filedesc)
  {

    $max_file_size = 10000;
    $file_size = $_FILES["file"]['size'];

    if ($file <= $max_file_size) {

      try {
        #retrieve file title
        $date = date("Y-m-d h:i:sa");
        $upId = 1;
        $filename = rand(1000, 10000) . "-" . $_FILES["file"]["name"];
        $tname = $_FILES["file"]["tmp_name"];

        #upload directory path
        $uploads_dir = './uploads';
        #TO move the uploaded file to specific location
        move_uploaded_file($tname, $uploads_dir . '/' . $filename);

        $path = SERVER_URL . '/uploads/';

        #sql query to insert into database
        $sql = "INSERT INTO bestanden (naam, upload_datum, uploader_id, bestand_omschrijving, bestand_path) ";
        $sql .= "VALUES('$filename','$date','$upId','$filedesc', '$path')";
        var_dump($sql);
        $result = $this->datahandler->createData($sql);

      } catch (PDOException $e) {
        if ($e->getCode() == 1062) {
          // Take some action if there is a key constraint violation, i.e. duplicate name
        } else {
          throw $e;
        }
      }
    } else {
      echo "De toegestane uploadgrootte is maximaal 10 MB, de file is de groot.";
    }
  }

  public function readAllFiles()
  {

    try {
      $query = "SELECT * FROM bestanden";
      $result = $this->datahandler->readsData($query);
      $results = $result->fetchAll();

      return $this->outputData->createTable($results);

    } catch (PDOException $e) {

      echo "Fout opgetreden";

    }

  }

  public function readFile($id)
  {

    try {

      $query = "SELECT naam, bestand_path FROM bestanden ";
      $query .= "WHERE id='$id'";
      $result = $this->datahandler->readsData($query);
      $results = $result->fetchAll();

      return $this->outputData->readFile($results);

    } catch (PDOException $e) {

      echo "Fout opgetreden";

    }
  }

  public function deleteFile($id)
  {

    try {

      $query = "SELECT naam, bestand_path FROM bestanden ";
      $query .= "WHERE id='$id'";
      $result = $this->datahandler->readsData($query);
      $results = $result->fetchAll();

      foreach ($results as $row) {
        $filename = $row['naam'];
      }

      $file = getcwd() . "/uploads/" . $filename;
      //echo "Absolute Path To Directory is: ";
      //echo $delfile;

      if (unlink($file)) {
        echo $filename . ' was deleted successfully!';
      } else {
        echo 'There was a error deleting ' . $filename;
      }

      $query = "DELETE FROM bestanden ";
      $query .= "WHERE id=$id";
      $result = $this->datahandler->deleteData($query);

    } catch (PDOException $e) {

      echo "Fout opgetreden";

    }
  }

  public function updateFile($bestand_id)
  {

    try {

      $query = "SELECT * FROM contacts ";
      $query .= "WHERE contact_id=$$bestand_id ";
      $result = $this->datahandler->readsData($query);
      $results = $result->fetchAll();

      return $this->outputData->updateTable($results);

    } catch (PDOException $e) {

      echo "Fout opgetreden";

    }
  }

}

?>