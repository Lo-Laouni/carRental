<?php
include_once('vehicles.php');
$v = new vehicle();
 if(isset($_GET['q'])){
   $id = $_GET['q'];

   $searchRslt = $v->getCarbyID($id);
   $txtOut = $searchRslt['v_id'].",".$searchRslt['v_brand'].",".$searchRslt['v_year'].",".$searchRslt['v_gear'].",".$searchRslt['v_seats'];
   echo json_encode($searchRslt);
 }

 if(isset($_POST['editCarform'])){
   $id = $_POST['edit_plateNumber'];
   $brand = $_POST['edit_vehicleBrand'];
   $year = $_POST['edit_vehicleYear'];
   $gear = $_POST['edit_gear'];
   $seats = $_POST['edit_seats'];

  $v->editVehicle($id,$brand,$year,$gear,$seats);
 }
 ?>
