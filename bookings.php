<?php
class bookings {
  bookingId ='';
  bookingDate='';
  bookingTime='';
  bookedCar='';
  bookedUser='';
  $connect = mysqli_connect("localhost","root","","phppot_examples");

  function getBookings(){
    $results = mysqli_query($connect, "SELECT * FROM bookings");
    $
  }
  function setBooking(){}
  function editBooking(){}
  function cancelBooking(){}
  function bookingStatus(){}
}
 ?>
