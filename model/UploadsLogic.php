<?php 

require_once 'model/Datahandler.php';
require_once 'view/OutputData.php';

class UploadsLogic {

    function __construct() {
        $this->dataHandler = new DataHandler("localhost", "mysql", "stagesite","root", "");
        $this->outputData = new OutputData();
    }

    public function uploadFile($filedesc) {
    
            try {
                #retrieve file title
                $date = date("Y-m-d h:i:sa");
                $upId = 1;
                $filename = rand(1000,10000)."-".$_FILES["file"]["name"];
                $tname = $_FILES["file"]["tmp_name"];
             
                #upload directory path
                $uploads_dir = './uploads';
                #TO move the uploaded file to specific location
                move_uploaded_file($tname, $uploads_dir.'/'.$filename);
         
                #sql query to insert into database
                $sql = "INSERT INTO bestanden (naam, upload_datum, uploader_id, bestand_omschrijving) "; 
                $sql .= "VALUES('$filename','$date','$upId','$filedesc')";
                $result = $this->dataHandler->createData($sql);
                
           } catch (PDOException $e) {
               if ($e->getCode() == 1062) {
                   // Take some action if there is a key constraint violation, i.e. duplicate name
               } else {
                   throw $e;
               }
           }
    }

    public function readAllFiles(){

        try {
            $query = "SELECT id, naam, upload_datum, uploader_id, bestand_omschrijving FROM bestanden";
            $result = $this->dataHandler->readsData($query);
            $results = $result->fetchAll();

            return $this->outputData->createTable($results);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }

    }

    public function readFile($id){

        try {

            $query = "SELECT naam, bestand_path FROM bestanden ";
            $query .= "WHERE id='$id'";
            $result = $this->dataHandler->readsData($query);
            $results = $result->fetchAll();

            return $this->outputData->readFile($results);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
    }

    public function deleteFile($id){

        try {

            $query = "DELETE FROM bestanden ";
            $query .= "WHERE id=$id";
            $result = $this->dataHandler->deleteData($query);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
    }

    public function updateFile($bestand_id){

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