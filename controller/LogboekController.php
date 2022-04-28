<?php
    require_once 'model/LogboekModel.php';
    require_once 'view/LogboekView.php';
    require_once "view/compleetLogboek.php";

    class LogboekController {
        public function __construct(){
            $this->Logboek = new LogboekModel();
        }

        public function __destruct(){   
        }

        public function Index() {
            // self::toonLogboek();
        }

        public function toonLogboek() {
            // $logboekModel = new LogboekModel();
            // $logboekView = new LogboekView();

            // $userId = 7;
            // $stage = $logboekModel->stageinfo_ophalen($userId);
            // require_once "view/compleetLogboek.php";
        }

        public function bewerkDag($id) {
            $dag = $this->Logboek->logboekDag_ophalen($id);
            include "view/logboekDag.php";  

            if(isset($_POST["bewerk"])) {
                $beschrijving = $_POST["beschrijving"];
                $uurGewerkt = $_POST["uur_gewerkt"];

                $this->Logboek->bewerkDag($id, $beschrijving, $uurGewerkt);
                header("location: logboekcontroller");
            }

            if(isset($_POST["annuleren"])) {
                header("Location: " . SERVER_URL . "/logboekcontroller/");
                // echo "<script>alert('test')</script>";
            }
        }
    }
?>