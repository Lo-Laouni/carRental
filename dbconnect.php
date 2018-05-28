<?php
class dbconnect{
  public $link;
  public function __construct(){
    $this->link = mysqli_connect('localhost','root','luxmdm','crental');
  }
}
?>
