<?php
require 'vehicles.php';
if (isset($_POST['addCarform'])){
  $id = $_POST['plateNumber'];
  $brand=$_POST['vehicleBrand'];
  $year = $_POST['vehicleYear'];
  $gear = $_POST['gear'];
  $seats = $_POST['seats'];
  $v = new vehicle();
  $newVehicle =  $v->newVehicle($id,$brand,$year,$gear,$seats);
  
  header("Location: admin.html");
}
 ?>
