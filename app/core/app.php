<?php

class App{

  private $controller;
  private $method;
  private $args = [];



  function __construct () {

    $url = $this->_parseURL();

    try{

      // here i need to verify if is everything alright
      // but for now i just need the get function
      $this->_getController($url[0]);


    // we just used the controller then
    // we should remove it from the array
     unset($url[0]);

      // if there's errors in the method it will throw a new exception
      if(!$this->_getMethod($url[1]))
        throw new Exception("Este Método não exists", 1);


      // we just used the method then
      // we should remove it from the array
      unset($url[1]);


      //if there is anything left in the array put it as paramters
      if(isset($url))
        $this->args  = $url;


      //call the method
      call_user_func_array(array($this->controller, $this->method), $this->args);

    }catch(Exception $e){
      echo 'o que o capeta fez: '. $e->getMessage() .'satanas é sujo';
    }
  }



  private function _parseURL  ()  {
    if(isset($_GET['url']))
      return explode('/', rtrim($_GET['url'], '/'));
    else
      return array('home','index');
  }



  private function _getController  ($name) {
      $name .="Controller";
      $this->controller = new $name;

  }



  private function _getMethod($name)  {
    if(method_exists($this->controller, $name)){
      $this->method = $name;
      return true;
    }else
      return false;
  }


  public static function getURL(){
    echo $_SYSTEM['REQUIRE_URL'];
  }


}


?>
