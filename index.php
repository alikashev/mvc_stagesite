<?php
// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', __DIR__."/");
define('SERVER_URL', "/" . "mvc_stagesite");
//define('SERVER_URL', "http://volgstage.nl");
define('VIEW_URL', SERVER_URL . "/" . "view");
define('CONTROLLER_URL', SERVER_URL . "/" . "controller");

// Includes
require(ROOT_DIR .'model/Router.php');

$start = new Router();
?>