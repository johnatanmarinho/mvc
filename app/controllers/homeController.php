<?php

class homeController extends Controller{

  public function index($arg = 'mateus', $arg2 = 'baitola'){
    $this->view('home', $data = array('quem' => $arg,
                                      'oque' => $arg2));
  }

}

?>
