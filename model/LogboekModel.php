<?php
    require_once 'model/datahandler.php';
    require_once 'view/outputData.php';

    class LogboekModel {
        public function __construct() {
            $this->datahandler = new datahandler("localhost", "mysql", "stagesite","root", "");
            $this->outputData = new OutputData();
        }

        public function __destruct(){}

        function logboek_ophalen($logboekId) {
            // haal de data van een logboek op
            $query = "SELECT * FROM logboek WHERE id = $logboekId";
            $result = $this->datahandler->readsData($query);

            return $result->fetchObject();
        }

        function create_logboek_dagen($logboekId, $start_datum, $eind_datum) {
            // maakt alle logboekdagen aan
            // student::create_logboek_dagen($stage->logboek_id, $start_datum, $eind_datum);
            $start = $start_datum->format('Y-m-d');
            $eind = $eind_datum->format('Y-m-d');
            $startdate=strtotime($start);
            $enddate=strtotime($eind);

            while ($startdate < $enddate) {
                $start_var = date("Y-m-d", $startdate);
                $query = "INSERT INTO logboek_dagen(logboek_id, dag, beschrijving_werkzaamheden, uur_gewerkt, ingediend) VALUES($logboekId, $start_var, '', 0, 0)";
                $result = $this->datahandler->createData($query);
                $startdate = strtotime("+1 days", $startdate);
            }
        }

        function logboekDagen_ophalen($logboekId) {
            // haal de data van alle logboek dagen op
            $query = "SELECT * FROM logboek_dagen WHERE logboek_id = $logboekId";
            $result = $this->datahandler->readsData($query);

            return $result->fetchAll(PDO::FETCH_OBJ);
        }

        function logboekDag_ophalen($id) {
            // haal de data van alle logboek dagen op
            $query = "SELECT * FROM logboek_dagen WHERE id = $id";
            $result = $this->datahandler->readsData($query);

            return $result->fetchObject();
        }

        function stageinfo_ophalen($userId) {
            // haal de data van alle stages op
            $query = "SELECT * FROM stages WHERE stagiair_id = $userId";
            $result = $this->datahandler->readsData($query);

            return $result->fetchObject();
        }

        function enkel_stageinfo_ophalen($stageId) {
            // haal de data van 1 stage op
            $query = "SELECT * FROM stages WHERE id = $stageId";
            $result = $this->datahandler->readsData($query);

            return $result->fetchObject();
        }

        function huidige_stage($userId) {
            // bekijk welke stage er nu actief is
            $stages = self::stageinfo_ophalen($userId);

            foreach($stages as $stage) {
                if(!$stage->is_afgerond) {
                    return self::enkel_stageinfo_ophalen($stage->id);
                }
            }
        }

        function bewerkDag($id, $beschrijving, $uurGewerkt) {
            //bewerkt de dag met het meegegeven id
            $query = "UPDATE logboek_dagen SET beschrijving_werkzaamheden = '$beschrijving', uur_gewerkt = $uurGewerkt WHERE id = $id";
            $result = $this->datahandler->updateData($query);
        }

        function indienDag($id) {
            //bewerkt de dag met het meegegeven id
            $query = "UPDATE logboek_dagen SET ingediend = 1 WHERE id = $id AND uur_gewerkt > 0";
            $result = $this->datahandler->updateData($query);
            header("location: ../../LogboekController");
        }

        function indienDagen($ids) {
            $ids = implode(",", $ids);
            if($ids != "") {
                $query = "UPDATE logboek_dagen SET ingediend = 1 WHERE id IN ($ids)";
                $result = $this->datahandler->updateData($query);
            }
        }

        function indienAlleDagen($logboekId) {
            $query = "UPDATE logboek_dagen SET ingediend = 1  WHERE logboek_id = $logboekId AND ingediend = 0 AND uur_gewerkt > 0;";
            $result = $this->datahandler->updateData($query);
        }
    }
?>