<?php
require_once 'model/DataHandler.php';

class Main
{
  public function __construct()
  {
    $this->datahandler = new DataHandler("localhost", "mysql", "stagesite", "root", "");
//    $this->datahandler = new datahandler("localhost", "mysql", "stenniz_volgstage", "stenniz_stage", "Stenniz1!");
    $this->outputData = new OutputData();
  }
}