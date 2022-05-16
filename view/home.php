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
</head>
<body>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <img class="logo" src="<?= SERVER_URL ?>/assets/img/logo-zwart.png" alt="">
        </div>

        <ul class="list-unstyled components">
            <p>Volgstage</p>
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
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <p>Hier wat tekst...</p>
                </div>

              <?php if ($account->loginCheck()): ?>
                  <a class="logout" href="<?= SERVER_URL ?>/Logout/">Uitloggen</a>
              <?php else: ?>
                  <a class="login" href="<?= SERVER_URL ?>/Login/">Inloggen</a>
              <?php endif; ?>

              <?php if (!$account->loginCheck()): ?>
                  <a class="register" href="<?= SERVER_URL ?>/Register/">Registreren</a>
              <?php endif; ?>
            </div>
        </nav>

        <h2>Collapsible Sidebar Using Bootstrap 4</h2>

        <div class="header-content">
            <img class="header-img" src="https://via.placeholder.com/500x300" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in deserunt mollit anim id est laborum.</p>
        </div>

        <div class="line"></div>

        <div class="demo">
          <?= $obj ?>
        </div>

        <div class="line"></div>

        <h2>Lorem Ipsum Dolor</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.</p>

        <div class="line"></div>

        <h3>Lorem Ipsum Dolor</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.</p>
    </div>
</div>

</body>
</html>