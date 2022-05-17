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
    <title>FrontEnd -  Stagesite</title>
    <link rel="stylesheet" href="<?= SERVER_URL ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="<?=SERVER_URL . "/assets/js/main.js"?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</head>
<body>

<div class="wrapper">
<nav id="sidebar">
            <div class="sidebar-header">
                <img class="logo" src="<?=SERVER_URL?>/assets/img/logo-zwart.png" alt="">
            </div>

            <ul class="list-unstyled components">
                <p>Volgstage</p>
            <li>
                <a href="javascript:loadPage('<?=SERVER_URL?>/UploadsController/collectReadAllFiles')">Uploaden</a>
            </li>
            <li>
                <a href="javascript:loadPage('<?=SERVER_URL?>/UserController/')">Gebruikers</a>
            </li>
            <li>
                <a href="javascript:loadPage('<?=SERVER_URL?>/ContractController/')">Stages</a>
            </li>
            <li>
                <a href="javascript:loadPage('HIER DE LINK NAAR DE CONTROLLER')">navitem</a>
        </li>
    </ul>
</nav>