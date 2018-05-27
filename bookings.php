<?php
require 'dbConnect.php';

class bookings {
  $bookingId ='';
  $bookingDate='';
  $bookingTime='';
  $bookedCar='';
  $bookedUser='';
  $bookingStatus;
  $link = new dbConnect();
  $connect = $link->connect();

  function getBookings(){
    $results = mysqli_query($connect, "SELECT * FROM bookings");
    $
  }
  function setBooking($id, $date,$time,$car,$user,$status){
    $this->$bookingId = $id;
    $this->bookingDate = $date;
    $this->bookingTime = $time;
    $this->bookedCar = $car;
    $this->bookedUser = $user;
    $this->bookingStatus = $status;

    $addBooking = mysqli_query($connect, "INSERT INTO booking (bkg_id, bkg_date, bkg_time, bkg_status, bkg_vehicle, bkg_user)
    VALUES ($this->$bookingId, $this->bookingDate, $this->bookingTime, $this->bookingStatus, $this->bookedCar, $this->bookedUser)";

    return mysql_affected_rows($addBooking);
  }
  function editBooking($booking_ref, $field, $newdata){
    $editBooking = mysqli_query($connect, "UPDATE vehicles SET ".$field."=".$newdata." WHERE id=".$booking_ref);
    return mysql_affected_rows($editBooking);
  }
  function cancelBooking(){}
  function bookingStatus(){}
}
 ?>
