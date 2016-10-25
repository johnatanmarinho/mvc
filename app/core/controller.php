<?php

abstract class Controller{


  public function view($view, array $data = []){
    include_once '../app/views/'. $view .'.php';
  }
}

?>
