<?php
  require 'dbConnect.php';
  class user {
    $id;
    $firstName='';
    $lastName='';
    $address='';
    $dLicenseNo='';
    $dLicenseExpDate;
    $username='';
    $password='';
    $link = new dbConnect();
    $connect = $link->connect();

    function __construct($id, $firstName,$lastName, $address, $dLicenseNo, $dLicenseExpDate, $username, $password){
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->address = $address;
      $this->dLicenseNo = $dLicenseNo;
      $this->dLicenseExpDate = $dLicenseExpDate;
      $this->username = $username;
      $this->password = $password;
      $this->id = $id;
    }

    function registerUser(){


      $userInsert = "INSERT INTO Users (UserId,username, password, firstName, lastName, address, dLicenseNo, dLicenseExpDate)
      VALUES (this=>$id, this=>$username, this=>$password, this=>$firstName, this=>$lastName, this=>$address, this=>$dLicenseNo, this=>$dLicenseExpDate)";

      if (mysqli_query($connect, $userInsert)){
        echo "User added Successfully"
      }
      else{
        echo "Error updating record: " . mysqli_error($connect);
      }
      $connect->close();
    }

    function loginAuth(){
      $message="";
      if(count($_POST)>0) {

        $result = mysqli_query($connect,"SELECT * FROM users WHERE username='" . $_POST["userName"] . "' and password = '". $_POST["password"]."'");
        $count  = mysqli_num_rows($result);
        $user = mysqli_fetch_array($result);
        if($count==0) {
          $message = "Invalid Username or Password!";
        } else {
          $message = "You are successfully authenticated!";
          session_start();
          $_SESSION['id'] = $user['userId'];
        }

        $result->close();
        $conn->close();
      }
      return $message;
    }

    function getBookingHist (){
      
      session_start();
      $result = mysqli_query($connect, "SELECT * FROM bookings WHERE userId='".$_SESSION['id']."'");
      $count = mysqli_num_rows($result);
      if($count==0){
        return 'No Bookings available';
      } else {
        $user = mysqli_fetch_row($result);
        return $user;
      }
      $result->close();
      $connect->close();
    }

    function checkBookingStatus(){}

    function logOut(){
      sessiom_start();
      session_destroy();
    }

  }
?>
