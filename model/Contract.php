<?php

require_once 'Model/datahandler.php';
require_once 'View/outputData.php';

class Contract {

    public function __construct() {
        $this->datahandler = new datahandler("localhost", "mysql", "stagesite","root", "");
        $this->outputData = new OutputData();
    }

    public function __destruct(){}
    
    public function AddContract($internId, $companyId, $mandatoryHours, $approvedHours, $startDate, $endDate, $finished, $supervisorId, $teacherId, $logId){

        try {

            $query = "INSERT INTO stages (stagiair_id, stage_bedrijven_id, aantal_uren_nodig, aantal_uren_goedgekeurd, start_datum, eind_datum, is_afgerond, stagebegeleider_id, contactpersoon_stage_id, praktijkbegeleider_stage_id, logboek_id)";
            $query .= " VALUES ('$internId', '$companyId', '$mandatoryHours', '$approvedHours', '$startDate', '$endDate', '$finished', '$supervisorId', '$teacherId', '$supervisorId', '$logId');";
            $result = $this->datahandler->createData($query);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
        
    }

    public function readAllContracts(){

        try {

            $query = "SELECT * FROM stages";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $results;
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }

    }

    public function readOneContract($id){

        try {

            $query = "SELECT * FROM stages ";
            $query .= "WHERE id = $id";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $results;
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
    }

    public function deleteContract($id){

        try {

            $query = "DELETE FROM stages ";
            $query .= "WHERE id = $id ";
            $result = $this->datahandler->deleteData($query);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
    }

    public function updateContract($id, $internId, $companyId, $mandatoryHours, $approvedHours, $startDate, $endDate, $finished, $supervisorId, $teacherId, $logId){

        try {
            $query = "UPDATE stages SET stagiair_id = '$internId', stage_bedrijven_id = '$companyId', aantal_uren_nodig = '$mandatoryHours', aantal_uren_goedgekeurd = '$approvedHours', start_datum = '$startDate', eind_datum = '$endDate', is_afgerond = '$finished', stagebegeleider_id = '$supervisorId', contactpersoon_stage_id = '$teacherId', praktijkbegeleider_stage_id = '$supervisorId', logboek_id = '$logId'";
            $query .= " WHERE id = $id";
            // var_dump($query); die;
            $result = $this->datahandler->updateData($query);
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
    }
    
}

?>