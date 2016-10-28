<?php

abstract class Base{
  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';
  protected $database = 'train_mvc';
  protected $conn;

  function __contruct(){
    $this->_connect();
  }

  private function _connect(){
    $this->conn = new Mysqli($this->host, $this->user, $this->pass, $this->database);
    if($this->conn->connect_error)
      die('Connect Error ('. $this->conn->connect_errno . ') '
                           . $this->conn->connect_error);
  }

  abstract function showAll();        //this must return an array with all the objects
  abstract function addNew($object);  //this obviously add a new object to the database
  abstract function find($object);    //this will find an object accord to the information passed by
  abstract function update($object);
  abstract function delete($object);

}

?>
