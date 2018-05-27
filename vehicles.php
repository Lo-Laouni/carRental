<?php
require 'dbConnect.php';
class vehicle {
  public $id ='';
  public $brand = '';
  public $year = '';
  public $rentPrice = '';
  public $gear = '';
  public $seats='';

  public function newVehicle($id, $brand,$year,$gear,$seats){
    $connect = new dbConnect();

    $this->id=$id;
    $this->brand = $brand;
    $this->year = $year;
    $this->rentPrice = '0';
    $this->gear = $gear;
    $this->seats = $seats;

    $link = mysqli_query($connect->link, "INSERT INTO `vehicle` (`v_id`, `v_brand`, `v_year`, `v_gear`, `v_seats`, `v_rental`,`v_img`)
    VALUES ('$this->id', '$this->brand','$this->year', '$this->gear', '$this->seats',NULL, NULL)");

    return mysqli_affected_rows($connect->link);
  }
  function getCarDetails(){
    $connect = new dbConnect();

    $result = mysqli_query($connect, "SELECT * FROM vehicles");
    $count=mysqli_num_rows($result);
    $cars=mysqli_fetch_row($result);
    return $cars;
  }

  function editVehicle($vehicleId,$field,$newdata){
    $connect = new dbConnect();

    $sql = "UPDATE vehicles SET ".$field."=".$newdata." WHERE id=".$vehicleId;
    return mysqli_affected_rows(mysqli_query($connect, $sql));
  }

  function removeCar($id){
    $connect = new dbConnect();

    $query = "DELETE FROM vehicles WHERE id='".$id."'";
    $deleteCar = mysqli_query($connect,$query);
    if ($deleteCar){
      return 'Vehicle data successfully deleted';
    }
    else{
      return 'Error deleting record: '.mysqli_error($deleteCar);
    }
  }
}

 ?>
