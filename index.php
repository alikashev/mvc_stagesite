<?php
// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', __DIR__."\\");
define('SERVER_URL', "/");
define('VIEW_URL', "/" . "view");
define('CONTROLLER_URL', "/" . "controller");

// Includes
// require(APP_DIR .'config.php');
require(ROOT_DIR .'model/Router.php');

// Define base URL
// global $config;
// define('BASE_URL', $config['base_url']);
$start = new Router();
?>