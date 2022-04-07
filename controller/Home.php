<?php

// require_once 'Model/User.php';
require_once 'view/OutputData.php';

class Home {

    public function __construct(){

        // $this->User = new User();
        $this->OutputData = new OutputData();
    }

    public function __destruct(){}

    public function Index()
    {
        echo "<h1>Hello, World!</h1>";
    }
}

?>