<?php
    require_once 'view/compleetLogboek.php';

    class LogboekView {
        public function __construct(){
        }

        public function __destruct(){   
        }

        function toon_logboek_dagen($logboekId) {
            // toon alle logboekdagen
            $logboekModel = new LogboekModel();
            $logboekdagen = $logboekModel->logboekDagen_ophalen($logboekId);

            foreach($logboekdagen as $logboekdag) {
                $datum = strtotime($logboekdag->dag);
                $dag = date('d-m-Y', $datum);
                $wijzig = "<button onclick='wijzigFunctie();'>wijzig</button>";
                if($logboekdag->ingediend){
                    $ingediend = "Ingediend";
                } else {
                    // button onclick functie aanmaken
                    $ingediend = "<button onclick='indienFunctie();'>Indienen</button>";
                }
                echo "<div class='logboekDag'><div class='logboekDag_dag'>$dag</div><div class='logboekDag_beschrijving'>$logboekdag->beschrijving_werkzaamheden</div><div class='logboekDag_urenGewerkt'>Uren gewerkt: $logboekdag->uur_gewerkt</div><div class='logboekDag_urenIngediend'>$ingediend</div><div class='logboekDag_wijzig'>$wijzig</div></div>";
            }
        }
}