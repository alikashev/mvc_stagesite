<?php
    class StageInfo {
        // function __construct() {
        // }

        function MaakInfoBoxes($varArray) {
            $InfoBoxes = 
                "
                    <style>
                        #container {
                            border: 3px solid black;
                            background-color: gray;
                            padding: 5px;
                        }

                        .infobox {
                            border: 3px solid blue;
                            margin-bottom: 5px;
                            margin-top: 5px;
                            background-color: beige;
                        }

                        .header {
                            margin: 5px;
                            font-size: 34px;
                        }

                        .content {
                            margin-bottom: 5px;
                            overflow: hidden;
                        }
                        
                        .Q {
                            float: left;
                            margin: 5px;
                            padding-left: 10px;
                            font-size: 22px;
                            border-left: 3px solid gray;
                        }

                        .A {
                            font-size: 20px;
                            color: blue;
                        }
                    </style>

                    <div id='container'>
                        <div class='infobox'>
                            <div class='header'>
                                Stage
                                <hr/>
                            </div>
                            <div class='content'>
                                <div class='Q'>Start datum:</p><p class='A'>$varArray[startDatum]</div>
                                <div class='Q'>Eind datum:</p><p class='A'>$varArray[eindDatum]</div>
                                <div class='Q'>Aantal uren nodig:</p><p class='A'>$varArray[urenNodig]</div>
                                <div class='Q'>Aantal uren goedgekeurd:</p><p class='A'>$varArray[urenGoedgekeurd]</div>
                                <div class='Q'>Stage afgerond:</p><p class='A'>$varArray[stageAfgerond]</div>
                            </div>
                        </div>

                        <div class='infobox'>
                            <div class='header'>
                                Stagebedrijf
                                <hr/>
                            </div>
                            <div class='content'>
                                <div class='Q'>Naam:</p><p class='A'>$varArray[stagebedrijfNaam]</div>
                                <div class='Q'>Email:</p><p class='A'>$varArray[stagebedrijfEmail]</div>
                                <div class='Q'>Telefoonnummer:</p><p class='A'>$varArray[stagebedrijfTelefoonnummer]</div>
                                <div class='Q'>Website URL:</p><p class='A'><a href='$varArray[stagebedrijfURL]'>$varArray[stagebedrijfURL]</a></div>
                                <div class='Q'>adres:</p><p class='A'>$varArray[stagebedrijfAdres]</div>
                            </div>
                        </div>

                        <div class='infobox'>
                            <div class='header'>
                                Stagebegeleider
                                <hr/>
                            </div>
                            <div class='content'>
                                <div class='Q'>Naam:</p><p class='A'>$varArray[stagebegeleiderNaam]</div>
                                <div class='Q'>Email:</p><p class='A'>$varArray[stagebegeleiderEmail]</div>
                                <div class='Q'>Telefoonnummer:</p><p class='A'>$varArray[stagebegeleiderTelefoonnummer]</div>
                            </div>
                        </div>

                        <div class='infobox'>
                            <div class='header'>
                                Praktijkbegeleider
                                <hr/>
                            </div>
                            <div class='content'>
                                <div class='Q'>Naam:</p><p class='A'>$varArray[praktijkbegeleiderNaam]</div>
                                <div class='Q'>Email:</p><p class='A'>$varArray[praktijkbegeleiderEmail]</div>
                                <div class='Q'>Telefoonnummer:</p><p class='A'>$varArray[praktijkbegeleiderTelefoonnummer]</div>
                            </div>
                        </div>

                        <div class='infobox'>
                            <div class='header'>
                                Contactpersoon
                                <hr/>
                            </div>
                            <div class='content'>
                                <div class='Q'>Naam:</p><p class='A'>$varArray[contactpersoonNaam]</div>
                                <div class='Q'>Email:</p><p class='A'>$varArray[contactpersoonEmail]</div>
                                <div class='Q'>Telefoonnummer:</p><p class='A'>$varArray[contactpersoonTelefoonnummer]</div>
                            </div>
                        </div>

                        <div class='infobox'>
                            <div class='header'>
                                Stagiair
                                <hr/>
                            </div>
                            <div class='content'>
                                <div class='Q'>Naam:</p><p class='A'>$varArray[stagiairNaam]</div>
                                <div class='Q'>Email:</p><p class='A'>$varArray[stagiairEmail]</div>
                                <div class='Q'>Telefoonnummer:</p><p class='A'>$varArray[stagiairTelefoonnummer]</div>
                            </div>
                        </div>
                    </div>
                ";

                return $InfoBoxes;
        }

        // function __destruct() {
        // }
}
