<?php
    require_once 'model/StudentModel.php';
    require_once 'view/stageInfo.php';

    class StudentController {

        public function __construct(){
        }

        public function __destruct(){   
        }

        public function Index() {
            //id veranderen naar het id van de huidige stage 
            self::showInfoBoxes(1);
        }

        public function showInfoBoxes($stageId) {
            //deze functie haalt data op van de huidige stage en toont deze data op het scherm
            $StudentModel = new StudentModel();
            $stage = $StudentModel->stageInfo($stageId);
            $stagebedrijf = $StudentModel->stagebedrijfInfo($stageId);
            $stagebegeleider = $StudentModel->stagebegeleiderInfo($stageId);
            $praktijkbegeleider = $StudentModel->praktijkbegeleiderInfo($stageId);
            $contactpersoon = $StudentModel->contactpersoonStageInfo($stageId);
            $stagiair = $StudentModel->stagiairInfo($stageId);

            $varArray = []; 
            $varArray['startDatum'] = $stage->start_datum;
            $varArray['eindDatum'] = $stage->eind_datum;
            $varArray['urenNodig'] = $stage->aantal_uren_nodig;
            $varArray['urenGoedgekeurd'] = $stage->aantal_uren_goedgekeurd;
            if($stage->is_afgerond){
                $varArray['stageAfgerond'] = "Ja";
            } else {
                $varArray['stageAfgerond'] = "Nee";
            }

            $varArray['stagebedrijfNaam'] = $stagebedrijf->naam;
            $varArray['stagebedrijfEmail'] = $stagebedrijf->email;
            $varArray['stagebedrijfTelefoonnummer'] = $stagebedrijf->telefoonnummer;
            $varArray['stagebedrijfURL'] = $stagebedrijf->url_website;
            $varArray['stagebedrijfAdres'] = $stagebedrijf->locatie;

            $varArray['stagebegeleiderNaam'] = $stagebegeleider->voornaam . " " . $stagebegeleider->tussenvoegsel . " " . $stagebegeleider->achternaam;
            $varArray['stagebegeleiderEmail'] = $stagebegeleider->email;
            $varArray['stagebegeleiderTelefoonnummer'] = $stagebegeleider->telefoonnummer;

            $varArray['praktijkbegeleiderNaam'] = $praktijkbegeleider->voornaam . " " . $praktijkbegeleider->tussenvoegsel . " " . $praktijkbegeleider->achternaam;
            $varArray['praktijkbegeleiderEmail'] = $praktijkbegeleider->email;
            $varArray['praktijkbegeleiderTelefoonnummer'] = $praktijkbegeleider->telefoonnummer;

            $varArray['contactpersoonNaam'] = $contactpersoon->voornaam . " " . $contactpersoon->tussenvoegsel . " " . $contactpersoon->achternaam;
            $varArray['contactpersoonEmail'] = $contactpersoon->email;
            $varArray['contactpersoonTelefoonnummer'] =$contactpersoon->telefoonnummer;

            $varArray['stagiairNaam'] = $stagiair->voornaam . " " . $stagiair->tussenvoegsel . " " . $stagiair->achternaam;
            $varArray['stagiairEmail'] = $stagiair->email;
            $varArray['stagiairTelefoonnummer'] = $stagiair->telefoonnummer;

            $StageInfo = new StageInfo();
            $InfoBoxes = $StageInfo->MaakInfoBoxes($varArray);

            echo $InfoBoxes;
            // return $InfoBoxes;
        }
    }
?>