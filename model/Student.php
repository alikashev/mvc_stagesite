<?php
    require_once 'Model/datahandler.php';
    require_once 'View/outputData.php';

    class StudentModel {

        public function __construct() {
            $this->datahandler = new datahandler("localhost", "mysql", "stagesite","root", "");
            $this->outputData = new OutputData();
        }

        public function __destruct(){}
        
        public function stageInfo($stageId){
            try {
                $query = "SELECT * FROM stages WHERE id = $stageId";
                $result = $this->datahandler->readsData($query);
                $results = $result->fetchObject();
    
                return $results;
                
            } catch (PDOException $e) {
                echo "Fout opgetreden";
            }
        }

        public function stagiairInfo($stageId){
            try {
                $stage = self::StageInfo($stageId);

                $query = "SELECT * FROM gebruikers WHERE id = $stage->stagiair_id";
                $result = $this->datahandler->readsData($query);
                $results = $result->fetchObject();
    
                return $results;
        
            } catch (PDOException $e) {
                echo "Fout opgetreden";
            }
        }

        public function stagebedrijfInfo($stageId){
            try {
                $stage = self::StageInfo($stageId);

                $query = "SELECT * FROM stage_bedrijven WHERE id = $stage->stage_bedrijven_id";
                $result = $this->datahandler->readsData($query);
                $results = $result->fetchObject();

                return $results;
                
            } catch (PDOException $e) {
                echo "Fout opgetreden";
            }
        }

        public function stagebegeleiderInfo($stageId){
            try {
                $stage = self::StageInfo($stageId);

                $query = "SELECT * FROM gebruikers WHERE id = $stage->stagebegeleider_id";
                $result = $this->datahandler->readsData($query);
                $results = $result->fetchObject();
    
                return $results;
                
            } catch (PDOException $e) {
                echo "Fout opgetreden";
            }
        }

        public function praktijkbegeleiderInfo($stageId){
            try {
                $stage = self::StageInfo($stageId);

                $query = "SELECT * FROM gebruikers WHERE id = $stage->praktijkbegeleider_stage_id";
                $result = $this->datahandler->readsData($query);
                $results = $result->fetchObject();
    
                return $results;
                
            } catch (PDOException $e) {
                echo "Fout opgetreden";
            }
        }

        public function contactpersoonStageInfo($stageId){
            try {
                $stage = self::StageInfo($stageId);

                $query = "SELECT * FROM gebruikers WHERE id = $stage->contactpersoon_stage_id";
                $result = $this->datahandler->readsData($query);
                $results = $result->fetchObject();
    
                return $results;
        
            } catch (PDOException $e) {
                echo "Fout opgetreden";
            }
        }
    }
?>