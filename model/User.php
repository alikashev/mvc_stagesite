<?php

require_once 'Model/datahandler.php';
require_once 'View/outputData.php';

class User {

    public function __construct() {
        $this->datahandler = new datahandler("localhost", "mysql", "stagesite","root", "");
        $this->outputData = new OutputData();
    }

    public function __destruct(){}
    
    public function addUser($firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSupervisor, $isSchoolSupervisor, $isSchoolAccount, $isHumanResources, $isParent, $school, $study){

        try {

            $query = "INSERT INTO gebruikers (voornaam, tussenvoegsel, achternaam, email, telefoonnummer, is_schoolmentor, is_stagebegeleider, is_praktijkbegeleider, is_schoolaccount, is_vertrouwenspersoon, is_ouder, schoolnaam, studie";
            $password !== '' ? $query .= ", wachtwoord_hash)" : $query .= ")";
            $password !== '' ? $hash_password = password_hash($password, PASSWORD_BCRYPT) : '';
            $query .= " VALUES ('$firstName', '$infix', '$lastName', '$email', '$phone', '$isTeacher', '$isSupervisor', '$isSchoolSupervisor', '$isSchoolAccount', '$isHumanResources', '$isParent', '$school', '$study'";
            $password !== '' ? $query .= ", '$hash_password');" : $query .= ");";
            $this->datahandler->createData($query);
            $result = $this->datahandler->lastInsertId();
            return $result;
            
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
        
    }

    public function readAllUsers(){

        try {

            $query = "SELECT id, voornaam, tussenvoegsel, achternaam, email, telefoonnummer, is_schoolmentor, is_stagebegeleider, is_praktijkbegeleider, is_schoolaccount, is_vertrouwenspersoon, is_ouder, schoolnaam, studie FROM gebruikers";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $results;
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }

    }

    public function readAllUsersByTeacher($id){

        try {

            $query = "SELECT gebruikers.id, voornaam, tussenvoegsel, achternaam, email, telefoonnummer, schoolnaam, studie, stagebegeleider_id, schoolmentor_id, praktijkbegeleider_stage_id, ouder_id FROM gebruikers LEFT JOIN stages ON gebruikers.id = stages.stagiair_id WHERE stages.schoolmentor_id = $id";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $results;
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";
            return false;
        }

    }

    public function readAllBySupervisor($id){

        try {

            $query = "SELECT gebruikers.id, voornaam, tussenvoegsel, achternaam, email, telefoonnummer, schoolnaam, studie, stagebegeleider_id, schoolmentor_id, praktijkbegeleider_stage_id, ouder_id FROM gebruikers LEFT JOIN stages ON gebruikers.id = stages.praktijkbegeleider_stage_id WHERE stages.praktijkbegeleider_stage_id = $id";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $results;

        } catch (PDOException $e) {

            echo "Fout opgetreden";
            return false;
        }

    }

    public function readAllBySchoolSupervisor($id){

        try {

            $query = "SELECT gebruikers.id, voornaam, tussenvoegsel, achternaam, email, telefoonnummer, schoolnaam, studie, stagebegeleider_id, schoolmentor_id, praktijkbegeleider_stage_id, ouder_id FROM gebruikers LEFT JOIN stages ON gebruikers.id = stages.praktijkbegeleider_stage_id WHERE stages.stagebegeleider_id = $id";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $results;

        } catch (PDOException $e) {

            echo "Fout opgetreden";
            return false;
        }

    }

    public function readAllByParent($id){

        try {

            $query = "SELECT gebruikers.id, voornaam, tussenvoegsel, achternaam, email, telefoonnummer, schoolnaam, studie, stagebegeleider_id, schoolmentor_id, praktijkbegeleider_stage_id FROM gebruikers LEFT JOIN stages ON gebruikers.id = stages.ouder_id WHERE stages.ouder_id = $id";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $results;

        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }

    }

    public function readAllBySchoolName($id){

        try {
            $query = "SELECT schoolnaam FROM gebruikers WHERE id = '$id'";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            $schoolname = $results[0]['schoolnaam'];

            $query2 = "SELECT gebruikers.id, voornaam, tussenvoegsel, achternaam, email, telefoonnummer, schoolnaam, studie FROM gebruikers WHERE schoolnaam = '$schoolname'";
            $result2 = $this->datahandler->readsData($query2);
            $results2 = $result2->fetchAll();

            return $results2;

        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }

    }

    public function readAllStudents() {
        try {
            $sql = "SELECT * FROM gebruikers WHERE is_schoolmentor = 0 AND is_stagebegeleider = 0 AND is_praktijkbegeleider = 0 AND is_schoolaccount = 0 AND is_vertrouwenspersoon = 0 AND is_ouder = 0";
            $result = $this->datahandler->readsData($sql);
            $results = $result->fetchAll();

            return $results;

        } catch (PDOException $e) {
            echo "Fout opgreden: $e";
        }
    }

    public function readAllSupervisors() {
        try {
            $query = "SELECT * FROM gebruikers WHERE is_praktijkbegeleider = 1";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $results;
        } catch (PDOException $e) {
            echo "Fout opgetreden: " . $e;
        }
    }

    public function readAllTeachers() {
        try {
            $query = "SELECT * FROM gebruikers WHERE is_schoolmentor = 1";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $results;
        } catch (PDOException $e) {
            echo "Fout opgetreden: " . $e;
        }
    }

    public function readAllSchoolSupervisors()
    {
        try {
            $query = "SELECT * FROM gebruikers WHERE is_stagebegeleider = 1";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $results;
        } catch (PDOException $e) {
            echo "Fout opgetreden: $e";
        }
    }

    public function readAllHumanResources()
    {
        try {
            $query = "SELECT * FROM gebruikers WHERE is_vertrouwenspersoon = 1";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $results;
        } catch (PDOException $e) {
            echo "Fout opgetreden: $e";
        }
    }

    public function readAllParents()
    {
        try {
            $query = "SELECT * FROM gebruikers WHERE is_ouder = 1";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $results;
        } catch (PDOException $e) {
            echo "Fout opgetreden: $e";
        }
    }

    public function readOneUser($id){

        try {

            $query = "SELECT id, voornaam, tussenvoegsel, achternaam, email, telefoonnummer, is_schoolmentor, is_stagebegeleider, is_praktijkbegeleider, is_schoolaccount, is_vertrouwenspersoon, is_ouder, schoolnaam, studie FROM gebruikers ";
            $query .= "WHERE id = $id";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $results;
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
    }

    public function readOneUserByEmail($email) {
        try {
            $query = "SELECT * from gebruikers";
            $query .= " WHERE email = '$email'";
            var_dump($query);
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll(PDO::FETCH_OBJ);
            var_dump($results);

            return $results;
        } catch (PDOException $e) {
            echo "Fout opgetreden: $e";
            return false;
        }
    }

    // public function deleteUser($contact_id){

    //     try {

    //         $query = "DELETE FROM gebruikers ";
    //         $query .= "WHERE id = $contact_id ";
    //         $result = $this->datahandler->deleteData($query);
            
    //     } catch (PDOException $e) {

    //         echo "Fout opgetreden";

    //     }
    // }

    public function updateUser($id, $firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSchoolSupervisor, $isSupervisor, $isSchoolAccount, $isHumanResources, $isParent, $school, $study){

        try {
            $query = "UPDATE gebruikers SET voornaam = '$firstName', tussenvoegsel = '$infix', achternaam = '$lastName', email = '$email', telefoonnummer = '$phone', is_schoolmentor = '$isTeacher', is_praktijkbegeleider = '$isSupervisor', is_stagebegeleider = '$isSchoolSupervisor', is_schoolaccount = '$isSchoolAccount', is_vertrouwenspersoon = '$isHumanResources', is_ouder = '$isParent',  schoolnaam = '$school', studie = '$study'";
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