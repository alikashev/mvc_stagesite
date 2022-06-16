<?php
    // require_once 'view/compleetLogboek.php';

    class LogboekView {
        public function __construct(){
        }

        public function __destruct(){   
        }

        function toon_logboek_dagen($logboekId) {
            // toon alle logboekdagen
            $logboekModel = new LogboekModel();
            $logboekdagen = $logboekModel->logboekDagen_ophalen($logboekId);

            $aantalDagen = 1;
            $server_url = SERVER_URL;
            foreach($logboekdagen as $logboekdag) {
                $datum = strtotime($logboekdag->dag);
                $dag = date('d-m-Y', $datum);
                $wijzig = "<a href='javascript:loadPage1(\"$server_url/LogboekController/bewerkDag/$logboekdag->id\")'>wijzig</a>";
                $uur = $logboekdag->uur_gewerkt . 'U';
                if($logboekdag->ingediend){
                    $ingediend = "Ingediend";
                } else {
                    $ingediend = "<a href='javascript:loadPage1(\"$server_url/LogboekController/indienDag/$logboekdag->id\")'>Indienen</a>";
                }
                    
                $showFunctie = "onclick='showFunctie();'";

                //check of deze dag de huidige dag is
                if($dag == date('d-m-Y')) {
                    echo "<div id='huidigeDag' class='logboekDag'><div class='logboekDag_dag'>$dag</div><div class='logboekDag_beschrijving' id='$logboekdag->id' $showFunctie>$logboekdag->beschrijving_werkzaamheden</div><div class='logboekDag_urenGewerkt' id='$logboekdag->id' $showFunctie>$uur</div></div>";
                    echo "<div class='logboekDagExt' id='$logboekdag->id'>
                            <textarea class='logboekDagExt_beschrijving'>
                                $logboekdag->beschrijving_werkzaamheden
                            </textarea>
                            <div class='logboekDagExt_functies'>
                                <div class='logboekDagExt_enkele_functies'>
                                    <a href='#' class='indienen_knop'>Indienen</a>
                                </div>
                                <div class='logboekDagExt_enkele_functies'>
                                    <input class='number_knop' value='$logboekdag->uur_gewerkt' type='number'/>
                                </div>
                            </div>
                        </div>";
                } else {
                    echo "<div class='logboekDag'><div class='logboekDag_dag'>$dag</div><div class='logboekDag_beschrijving' id='$logboekdag->id' $showFunctie>$logboekdag->beschrijving_werkzaamheden</div><div class='logboekDag_urenGewerkt' id='$logboekdag->id' $showFunctie>$uur</div></div>";
                    echo "<div class='logboekDagExt' id='$logboekdag->id'>
                            <textarea class='logboekDagExt_beschrijving'>
                                $logboekdag->beschrijving_werkzaamheden
                            </textarea>
                            <div class='logboekDagExt_functies'>
                                <div class='logboekDagExt_enkele_functies'>
                                    <a href='#' class='indienen_knop'>Indienen</a>
                                </div>
                                <div class='logboekDagExt_enkele_functies'>
                                    <input class='number_knop' value='$logboekdag->uur_gewerkt' type='number'/>
                                </div>
                            </div>
                        </div>";
                }
               
                $check = $aantalDagen % 7;
                if(!$check) {
                    echo "<a href='javascript:loadPage1(\"$server_url/LogboekController/indienDagen/$logboekdag->id\")'>Dien alle dagen met ingvulde uren in voor deze week</a>";;
                    echo "<br/><hr/>";
                }
                $aantalDagen++;
            }
        }
}