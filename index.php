<?php
// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', __DIR__."\\");
// echo APP_DIR;

// Includes
// require(APP_DIR .'config.php');
require(ROOT_DIR .'model/Router.php');

// Define base URL
// global $config;
// define('BASE_URL', $config['base_url']);
$start = new Router();

?>