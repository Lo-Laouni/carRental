<<?php
class dbConnect {
  public $link;

  public function __construct(){
    $this->link = mysqli_connect('localhost','root','luxmdm','crental');
  }
} ?>
