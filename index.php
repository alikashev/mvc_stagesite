<?php

// require_once 'Controller/ContactsController.php';

// $controller = new ContactsController();
// $controller->handleRequest();

require_once 'Controller/AdminController.php';

$controller = new AdminController();
$controller->handleRequest();

?>