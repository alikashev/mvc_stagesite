<?php 

require_once 'model/Datahandler.php';
require_once 'view/OutputData.php';

class UploadsLogic {

    function __construct() {
        $this->dataHandler = new DataHandler("localhost", "mysql", "stagesite","root", "");
        $this->outputData = new OutputData();
    }

    public function uploadFile() {
        //require '../database/database.php';

        if (isset($_POST["submit"])) {
    
            try {
                #retrieve file title
                $date = date("Y-m-d h:i:sa");
                $fileName = $_POST["filename"];
                $upId = 1;
             
                #file name with a random number so that similar dont get replaced
                $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
            
                #temporary file name to store file
                $tname = $_FILES["file"]["tmp_name"];
            
                #upload directory path
                $uploads_dir = '../uploads';
                #TO move the uploaded file to specific location
                move_uploaded_file($tname, $uploads_dir.'/'.$pname);
         
                #sql query to insert into database
                $con->prepare("INSERT INTO bestanden (naam, upload_datum, bestand_data, uploader_id) VALUES('$fileName','$date','$pname', '$upId')")->execute();
           } catch (PDOException $e) {
               if ($e->getCode() == 1062) {
                   // Take some action if there is a key constraint violation, i.e. duplicate name
               } else {
                   throw $e;
               }
           }
            echo "Bestand succevol toegevoegd";  
        }
    }

    public function readAllFiles(){

        try {
            $query = "SELECT id, naam, upload_datum, bestand_data, uploader_id FROM bestanden";
            $result = $this->dataHandler->readsData($query);
            $results = $result->fetchAll();

            return $this->outputData->createTable($results);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }

    }

    public function readOneFile($bestand_id){

        try {

            $query = "SELECT * FROM contacts ";
            $query .= "WHERE contact_id=$bestand_id ";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $this->outputData->createTable($results);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
    }

    public function deleteFile($bestand_id){

        try {

            $query = "DELETE FROM contacts ";
            $query .= "WHERE contact_id=$bestand_id ";
            $result = $this->datahandler->deleteData($query);
            
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