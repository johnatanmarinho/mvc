<?php

class App{

  private $controller;
  private $method;
  private $args = [];



  function __contruct () {

    $url = $this->_parseURL();

    try{

      if (!$this->_callController($url[0]))
        throw new Exception("Error Processing the Controller", 1);
      }

      // remove o controller da  url
      unset($url[0]);

      if(!$this->_callMethod())
        throw new Exception("Error Processing the Method", 1);

      // remove o method da  url  obs('se der erro testar $url[1]')
      unset($url[0]);

      if(isset($url))
        $args  = $url;

      call_user_func_array(array($controller, $method), $args);

    catch(Exception $e){
      echo 'error';
    }
  }



  private function _parseURL  ()  {
    if(isset($_GET['url']))
      return explode('/', rtrim($_GET['url'], '/'));
    else
      returne array('home','index');
  }



  private function _callController  ($name) {
      echo $name .'<br/>';
      $this->controller = $name;
  }



  private function _callMethod($name)  {
    echo $name .'<br/>'
    $this->method = $name;
  }





}


?>
