<?php


?>
<style>
    <?php $url = $_SERVER['DOCUMENT_ROOT'] . "/MVC_STAGESITE/assets/css/dashboardMenu.css"; require_once $url; ?>
</style>
<!--
<div class="menu">
    <div class="menuContainer">
        <?php 
            // if($user->id == 1) {
                // echo de menu knoppen voor admin
                // echo "<div class='menuKnop'><a href='admin_gebruikers.php'>Admin Gebruikers</a></div>";
                // echo "<div class='menuKnop'><a href='admin_documenten.php'>Admin Documenten</a></div>";
                // echo "<div class='menuKnop'><a href='admin_logboek.php'>Admin Logboek</a></div>";
                // echo "<div class='menuKnop'><a href='admin_stages.php'>Admin Stages</a></div>";
            // } else if($user->is_docent) {
            //      // echo de menu knoppen voor docenten
            //     echo "<div class='menuKnop'>MenuKnopStageDocent4</div>";
            //     echo "<div class='menuKnop'>MenuKnopStageDocent4</div>";
            //     echo "<div class='menuKnop'>MenuKnopStageDocent4</div>";
            //     echo "<div class='menuKnop'>MenuKnopStageDocent4</div>";
            // }
            // else {
            //     // echo de menu knoppen voor studenten
            //     echo "<div class='menuKnop'><a href='stageinformatie.php'>Stage</a></div>";
            //     echo "<div class='menuKnop'><a href='logboek.php'>Logboek</a></div>";
            //     echo "<div class='menuKnop'><a href='documenten_overzicht.php'>Documenten</a></div>";
            // }   
//         ?>
    </div>
</div> -->

<nav id="sidebar">
    <div class="sidebar-header">
        <img class="logo" src="<?=SERVER_URL?>/assets/img/logo-zwart.png" alt="">
    </div>

    <ul class="list-unstyled components">
        <p>Volgstage</p>
        <li>
            <a href="<?=SERVER_URL?>/StudentController">Stage</a>
        </li>
        <li>
            <a href="<?=SERVER_URL?>/LogboekController">Logboek</a>
        </li>
        <li>
            <a href="<?=SERVER_URL?>/UploadsController">Upload dashboard</a>
        </li>
    </ul>

    <ul class="list-unstyled CTAs">
        <li>
            <a href="<?=SERVER_URL?>/Logout" class="login">uitloggen</a>
        </li>
    </ul>
</nav>