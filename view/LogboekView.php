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
            $url = '';
            foreach($logboekdagen as $logboekdag) {
                $datum = strtotime($logboekdag->dag);
                $dag = date('d-m-Y', $datum);
                if (!$logboekdag->ingediend) {
                    // $wijzig = "<a id='btnWijzig' href='javascript:loadPage1(\"$server_url/LogboekController/bewerkDag/$logboekdag->id/\")'>wijzig</a>";
                    $url = SERVER_URL . "/LogboekController/bewerkDag/$logboekdag->id";
                    $wijzig = "<input id='btnWijzig' type='submit' name='bewerk' value='Bewerken'>";
                } else {
                    $wijzig = "Gewijzigd";
                }
                $uur = $logboekdag->uur_gewerkt . 'U';
                if($logboekdag->ingediend){
                    $ingediend = "Ingediend";
                } else {
                    $ingediend = "<a href='javascript:loadPage1(\"$server_url/LogboekController/indienDag/$logboekdag->id\")'>Indienen</a>";
                }
                    
                $showFunctie = "onclick='showFunctie(this.id);'";

                $identical = "<div class='logboekDagExt hidden' id='ext$logboekdag->id'>
                            <form method='post' action='$url'>
                            <textarea id='logboekBeschrijving' class='logboekDagExt_beschrijving' name='beschrijving' required>
                                $logboekdag->beschrijving_werkzaamheden
                            </textarea>
                            <div class='logboekDagExt_functies'>
                                <div class='logboekDagExt_enkele_functies'>
                                $ingediend
                                </div>
                                <div class='logboekDagExt_enkele_functies'>
                                $wijzig
                                </div>
                                <div class='logboekDagExt_enkele_functies'>
                                    <input id='logboekUren' class='number_knop' value='$logboekdag->uur_gewerkt' name='uur_gewerkt' type='number'/>
                                </div>
                                </form>
                            </div>
                        </div>";

                //check of deze dag de huidige dag is
                if($dag == date('d-m-Y')) {
                    echo "<div id='huidigeDag' class='logboekDag' class='ingediend$logboekdag->ingediend'><div class='logboekDag_dag'>$dag</div><div class='logboekDag_beschrijving' id='$logboekdag->id' $showFunctie>$logboekdag->beschrijving_werkzaamheden</div><div class='logboekDag_urenGewerkt' id='$logboekdag->id' $showFunctie>$uur</div></div>";
                    echo $identical;
                } else {
                    echo "<div class='logboekDag' class='ingediend$logboekdag->ingediend'><div class='logboekDag_dag'>$dag</div><div class='logboekDag_beschrijving' id='$logboekdag->id' $showFunctie>$logboekdag->beschrijving_werkzaamheden</div><div class='logboekDag_urenGewerkt' id='$logboekdag->id' $showFunctie>$uur</div></div>";
                    echo $identical;
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