<?php
    class StageInfo {
        // function __construct() {
        // }

        function MaakInfoBoxes($varArray) {
            $InfoBoxes = 
                "
                    <div id='container'>
                        <div class='infobox'>
                            <div class='header'>
                                Stage:
                            </div>
                            <div class='content'>
                                <p class='Q'>Start datum:</p><p class='A'>$varArray[startDatum]</p>
                                <p class='Q'>Eind datum:</p><p class='A'>$varArray[eindDatum]</p>
                                <p class='Q'>Aantal uren nodig:</p><p class='A'>$varArray[urenNodig]</p>
                                <p class='Q'>Aantal uren goedgekeurd:</p><p class='A'>$varArray[urenGoedgekeurd]</p>
                                <p class='Q'>Stage afgerond:</p><p class='A'>$varArray[stageAfgerond]</p>
                            </div>
                        </div>

                        <div class='infobox'>
                            <div class='header'>
                                Stagebedrijf:
                            </div>
                            <div class='content'>
                                <p class='Q'>Naam:</p><p class='A'>$varArray[stagebedrijfNaam]</p>
                                <p class='Q'>Email:</p><p class='A'>$varArray[stagebedrijfEmail]</p>
                                <p class='Q'>Telefoonnummer:</p><p class='A'>$varArray[stagebedrijfTelefoonnummer]</p>
                                <p class='Q'>Website URL:</p><p class='A'><a href='$varArray[stagebedrijfURL]'>$varArray[stagebedrijfURL]</a></p>
                                <p class='Q'>adres:</p><p class='A'>$varArray[stagebedrijfAdres]</p>
                            </div>
                        </div>

                        <div class='infobox'>
                            <div class='header'>
                                Stagebegeleider:
                            </div>
                            <div class='content'>
                                <p class='Q'>Naam:</p><p class='A'>$varArray[stagebegeleiderNaam]</p>
                                <p class='Q'>Email:</p><p class='A'>$varArray[stagebegeleiderEmail]</p>
                                <p class='Q'>Telefoonnummer:</p><p class='A'>$varArray[stagebegeleiderTelefoonnummer]</p>
                            </div>
                        </div>

                        <div class='infobox'>
                            <div class='header'>
                                Praktijkbegeleider:
                            </div>
                            <div class='content'>
                                <p class='Q'>Naam:</p><p class='A'>$varArray[praktijkbegeleiderNaam]</p>
                                <p class='Q'>Email:</p><p class='A'>$varArray[praktijkbegeleiderEmail]</p>
                                <p class='Q'>Telefoonnummer:</p><p class='A'>$varArray[praktijkbegeleiderTelefoonnummer]</p>
                            </div>
                        </div>

                        <div class='infobox'>
                            <div class='header'>
                                Contactpersoon vanuit stage:
                            </div>
                            <div class='content'>
                                <p class='Q'>Naam:</p><p class='A'>$varArray[contactpersoonNaam]</p>
                                <p class='Q'>Email:</p><p class='A'>$varArray[contactpersoonEmail]</p>
                                <p class='Q'>Telefoonnummer:</p><p class='A'>$varArray[contactpersoonTelefoonnummer]</p>
                            </div>
                        </div>

                        <div class='infobox'>
                            <div class='header'>
                                Stagiair:
                            </div>
                            <div class='content'>
                                <p class='Q'>Naam:</p><p class='A'>$varArray[stagiairNaam]</p>
                                <p class='Q'>Email:</p><p class='A'>$varArray[stagiairEmail]</p>
                                <p class='Q'>Telefoonnummer:</p><p class='A'>$varArray[stagiairTelefoonnummer]</p>
                            </div>
                        </div>
                    </div>
                ";

                return $InfoBoxes;
        }

        // function __destruct() {
        // }
}