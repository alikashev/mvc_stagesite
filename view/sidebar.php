<div id="sidebar">
    
    <div class="sidebar-header">
        <div class="logoimg">
        <img class="img-logo" src="assets/img/logo.png" alt="">
        </div>
    </div>

    <ul class="list-unstyled components">
        <li>
            <a href="javascript:loadPage1('<?= SERVER_URL ?>/UserController/')">Gebruikers</a>
            <a href="javascript:loadPage1('<?= SERVER_URL ?>/ContractController/')">Stages</a>
        </li>
        <li>
            <a href="https://www.stennizworkshops.nl/contact.php">Contact</a>
        </li>
        <li>
            <a href="javascript:loadPage1('<?= SERVER_URL ?>/UploadsController/collectReadAllFiles')">Uploaden</a>
        </li>
        <li>
            <a id="logboek_btn" onclick="scrollFunctie();" href="javascript:loadPage1('<?= SERVER_URL ?>/LogboekController/')">Logboek</a>
        </li>
    </ul>
</div>
<script src="<?= SERVER_URL . "/assets/js/main.js" ?>"></script>
