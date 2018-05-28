<?php

require_once 'vehicles.php';
require_once 'user.php';

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
if (isset($_POST['userRegForm'])){
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $address = $_POST['address'];
  $dLicenseNo = $_POST['licenseNo'];
  $dLicenseExpDate = $_POST['licenseExp'];
  $uname = $_POST['uname'];
  $pwd = $_POST['psw'];
  $pwdCheck = $_POST['psw2'];

  $u = new user();
  $newUser = $u->newUser($fname,$lname,$address,$dLicenseNo,$dLicenseExpDate,$uname,$pwd);

  header("Location: home.html");
}
 ?>
