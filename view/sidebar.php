<!DOCTYPE html>
<?php
include_once "model/Account.php";
session_start();
$account = new Account();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrontEnd - Stagesite</title>
    <link rel="stylesheet" href="<?= SERVER_URL ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="<?= SERVER_URL . "/assets/js/main.js" ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>
<body>

    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <img class="logo" src="<?= SERVER_URL ?>/assets/img/logo-zwart.png" alt="">

                    <ul class="navitem list-unstyled components">
                        <?php if ($account->loginCheck()): ?>
                        <?php if ($account->adminCheck() || $account->supervisorCheck() || $account->schoolSupervisorCheck()): ?>
                        <li>
                            <a href="javascript:loadPage('<?= SERVER_URL ?>/UserController/')">Gebruikers</a>
                        </li>
                        <?php endif; ?>
                        <?php if ($account->adminCheck() || $account->supervisorCheck() || $account->schoolSupervisorCheck()): ?>
                        <li>
                            <a href="javascript:loadPage('<?= SERVER_URL ?>/ContractController/')">Stages</a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                        <li>
                            <a href="javascript:loadPage('<?= SERVER_URL ?>/UploadsController/collectReadAllFiles')">Uploaden</a>
                        </li>
                        <li>
                            <a href="javascript:loadPage('<?= SERVER_URL ?>/LogboekController/')">Logboek</a>
                        </li>
                        <?php if ($account->loginCheck()):?>
                            <a class="logout" href="<?=SERVER_URL?>/Logout/">Uitloggen</a>
                        <?php else:?>
                            <a class="login" href="<?=SERVER_URL?>/Login/">Inloggen</a>
                        <?php endif; ?>

                        <?php if (!$account->loginCheck()):?>
                            <a class="register" href="<?=SERVER_URL?>/Register/">Registreren</a>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>