<?php

abstract class Base{
  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';
  protected $database = 'train_mvc';
  protected $conn;

  function __contruct(){
    $this->conn = new Mysqli($this->host, $this->user, $this->pass, $this->database);

  }

  abstract function showAll();
  abstract function addNew($object);
  abstract function find($object);
  abstract function delete($object);

}

?>
