<?php

// require_once 'Model/User.php';
//require_once ROOT_DIR . 'view/OutputData.php';
require_once 'view/OutputData.php';

class Home {

    public function __construct(){

        // $this->User = new User();
        $this->OutputData = new OutputData();
    }

    public function __destruct(){}

    public function Index()
    {   
        $obj = "hoi";
        include_once 'view/home.php';
    }
}

?>