<<?php
class dbConnect(){
  protected $link;
  public $db_Name='';
  public $db_user='';
  public $db_pass='';
  public $db_host='';

  function connect(){
    $this->link = mysqli_connect($db_host,$db_user,$db_pass, $db_Name);
    return $this->link;
  }
} ?>
