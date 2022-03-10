<?php

require_once 'Model/datahandler.php';
require_once 'View/outputData.php';

class User {

    public function __construct() {
        $this->datahandler = new datahandler("localhost", "mysql", "stagesite","root", "");
        $this->outputData = new OutputData();
    }

    public function __destruct(){}
    
    public function addUser($contact_name, $contact_email, $contact_adress){

        try {

            $query = "INSERT INTO contacts (contact_name, contact_email, contact_adress)";
            $query .= "VALUES ('$contact_name', '$contact_email', '$contact_adress');";
            $result = $this->datahandler->createData($query);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
        
    }

    public function readAllUsers(){

        try {

            $query = "SELECT id, voornaam, tussenvoegsel, achternaam, email, telefoonnummer, is_docent, is_persoon_stage, schoolnaam, studie FROM gebruikers";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            // return $this->outputData->createTable($results);
            return $this->outputData->createTableAdmin($results);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }

    }

    public function readOneUser($id){

        try {

            $query = "SELECT * FROM gebruikers ";
            $query .= "WHERE id = $id";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $this->outputData->createTable($results);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
    }

    public function deleteUser($contact_id){

        try {

            $query = "DELETE FROM gebruikers ";
            $query .= "WHERE id = $contact_id ";
            $result = $this->datahandler->deleteData($query);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
    }

    public function updateUser($id){

        try {

            $query = "SELECT * FROM gebruikers ";
            $query .= "WHERE id=$id ";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();
            
            var_dump($results); die;

            return $this->outputData->updateTable($results);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
    }
    
}

?>