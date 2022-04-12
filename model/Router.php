<?php

/**
 * [Router description]
 */
class Router
{
  public function __construct()
  {
    // getPayload
    $url = $_SERVER['REQUEST_URI'];
    $packets = explode('/',$url);
    $this->determineDestination($packets);
  }
  /**
   * [determineDestination description]
   * @param  string $packets [description]
   * @return [type]          [description]
   */
  public function determineDestination($packets='')
  {
    // readPackets
    // Do our default checks and set URL params if absent
    if(isset($packets[2]) && $packets[2] != ''){
      $classname = $packets[2];
      $classname = ucfirst($classname);
    }else{
      $classname = "Home";
    }
    if(isset($packets[3]) && $packets[3] != ''){
      $method = $packets[3];
    }else{
      $method = "Index";
    }
    $params = array_slice($packets, 4);

    $this->sendToDestination($classname,$method,$params);
  }

  /**
   * [sendToDestination description]
   * @param  [type] $classname [description]
   * @param  [type] $method    [description]
   * @param  [type] $params    [description]
   * @return [type]            [description]
   */
  public function sendToDestination($classname,$method,$params)
  {
    $class =  ROOT_DIR . 'controller/' . $classname . '.php';
    require_once($class);
    // Create object and call method
    $obj = new $classname;
      die(call_user_func_array(array($obj, $method), $params));
  }

  public function __destruct()
  {
    # code...
  }
}