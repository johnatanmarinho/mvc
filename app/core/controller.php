<?php

abstract class Controller{


  public function view($view, array $data = []){
    require_once '../app/views/home/'. $view .'.php';
  }
}
