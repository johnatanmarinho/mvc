<?php

class App{

  private $controller;
  private $method;
  private $args = [];



  function __construct () {

    $url = $this->_parseURL();

    try{
      $this->_getController($url[0]);


      // remove o controller da  url
     unset($url[0]);


      if(!$this->_getMethod($url[1]))
        throw new Exception("Este Método não exists", 1);


      // remove o method da  url  obs('se der erro testar $url[1]')
      unset($url[1]);

      if(isset($url))
        $this->args  = $url;


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





}


?>
