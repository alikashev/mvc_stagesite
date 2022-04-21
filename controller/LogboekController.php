<?php
    require_once 'model/LogboekModel.php';
    require_once 'view/LogboekView.php';
    require_once "view/compleetLogboek.php";

    class LogboekController {
        public function __construct(){
        }

        public function __destruct(){   
        }

        public function Index() {
            // self::toonLogboek();
        }

        // public function toonLogboek() {
        //     $logboekModel = new LogboekModel();
        //     $logboekView = new LogboekView();

        //     $userId = 7;
        //     $stage = $logboekModel->stageinfo_ophalen($userId);
        // }
    }
?>