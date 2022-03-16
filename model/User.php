<?php

require_once 'Model/datahandler.php';
require_once 'View/outputData.php';

class User {

    public function __construct() {
        $this->datahandler = new datahandler("localhost", "mysql", "stagesite","root", "");
        $this->outputData = new OutputData();
    }

    public function __destruct(){}
    
    public function addUser($firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSupervisor, $school, $study){

        try {

            $query = "INSERT INTO gebruikers (voornaam, tussenvoegsel, achternaam, email, telefoonnummer, is_docent, is_persoon_stage, schoolnaam, studie";
            $password !== '' ? $query .= ", wachtwoord_hash)" : $query .= ")";
            $password !== '' ? $hash_password = password_hash($password, PASSWORD_BCRYPT) : '';
            $query .= " VALUES ('$firstName', '$infix', '$lastName', '$email', '$phone', '$isTeacher', '$isSupervisor', '$school', '$study'";
            $password !== '' ? $query .= ", '$hash_password');" : $query .= ");";
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

            return $results;
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }

    }

    public function readOneUser($id){

        try {

            $query = "SELECT id, voornaam, tussenvoegsel, achternaam, email, telefoonnummer, is_docent, is_persoon_stage, schoolnaam, studie FROM gebruikers ";
            $query .= "WHERE id = $id";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $results;
            
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

    public function updateUser($id, $firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSupervisor, $school, $study){

        try {
            // $query = "SELECT id, voornaam, tussenvoegsel, achternaam, email, telefoonnummer, is_docent, is_persoon_stage, schoolnaam, studie FROM gebruikers ";
            // $query .= "WHERE id=$id ";
            // $result = $this->datahandler->readsData($query);
            // $results = $result->fetchAll();

            $query = "UPDATE gebruikers SET voornaam = '$firstName', tussenvoegsel = '$infix', achternaam = '$lastName', email = '$email', telefoonnummer = '$phone', is_docent = '$isTeacher', is_persoon_stage = '$isSupervisor', schoolnaam = '$school', studie = '$study'";
            $password !== "" ? $hash_password = password_hash($password, PASSWORD_BCRYPT) : "";
            $password !== "" ? $query .= ", wachtwoord_hash = '$hash_password'" : "";
            $query .= " WHERE id = $id";
            $result = $this->datahandler->updateData($query);
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
    }
    
}

?>