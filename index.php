<?php
// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', __DIR__."\\");
define('SERVER_URL', "/" . "mvc_stagesite");
define('VIEW_URL', "/" . "mvc_stagesite" . "/" . "view");
define('CONTROLLER_URL', "/" . "mvc_stagesite" . "/" . "controller");

// Includes
require(ROOT_DIR .'model/Router.php');

$start = new Router();
?>