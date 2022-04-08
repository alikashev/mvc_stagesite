<?php

// require_once 'Model/User.php';
require_once ROOT_DIR . 'view/OutputData.php';

class Home {

    public function __construct(){

        // $this->User = new User();
        $this->outputData = new OutputData();
    }

    public function __destruct(){}

    public function Index()
    {
        echo "<h1>Hello, World!</h1>";
    }
}

?>