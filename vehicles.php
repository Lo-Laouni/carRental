<?php
require_once 'dbconnect.php';
class vehicle {
  public $id ='';
  public $brand = '';
  public $year = '';
  public $rentPrice = '';
  public $gear = '';
  public $seats='';

  public function newVehicle($id, $brand,$year,$gear,$seats){
    $connect = new dbconnect();

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

  public function getCarDetails(){
    $connect = new dbconnect();

    $result = mysqli_query($connect, "SELECT * FROM vehicles");
    $count=mysqli_num_rows($result);
    $cars=mysqli_fetch_row($result);
    return $cars;
  }

  public function getCarbyID($id){
    $connect = new dbconnect();

    $query = "SELECT * FROM vehicle WHERE v_id='".$id."'";
    $queryRun = mysqli_query($connect->link,$query);
    $queryResults = mysqli_fetch_assoc($queryRun);

    return $queryResults;
  }

  public function editVehicle($id, $brand,$year,$gear,$seats){
    $connect = new dbconnect();

    $sql = "UPDATE `vehicle` SET `v_brand`='".$brand."' , `v_year`='".$year."' ,`v_gear` ='".$gear."' ,v_seats ='".$seats."'
    WHERE `v_id`='".$id."'";
    return mysqli_affected_rows(mysqli_query($connect->link, $sql));
  }

  public function removeCar($id){
    $connect = new dbconnect();

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
