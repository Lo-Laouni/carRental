<?php

class vehicle {
  $id ='';
  $brand = '';
  $year = '';
  $rentPrice = '';
  $gear = '';
  $seats='';
  $connect = mysqli_connect("localhost","root","","phppot_examples");

  function __construct($brand,$year,$rentPrice,$gear,$seats){
    $this->id=$id;
    $this->brand = $brand;
    $this->year = $year;
    $this->rentPrice = $rentPrice;
    $this->gear = $gear;
    $this->seats = $seats;
  }
  function getCarDetails(){

    $result = mysqli_query($connect, "SELECT * FROM vehicles");
    $count=mysqli_num_rows($result);
    $cars=mysqli_fetch_row($result);
    return $cars;
  }

  function editVehicle(){}

  function removeCar($id){
    $query = "DELETE FROM vehicles WHERE id='".$id"'"
    $deleteCar = mysqli_query($connect,$query;
    if ($deleteCar){
      return 'Vehicle data successfully deleted';
    }
    else{
      return 'Error deleting record: '.mysqli_error($deleteCar);
    }
  }
}

 ?>
