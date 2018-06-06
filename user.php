<?php
  require_once 'dbconnect.php';
  class user {
    public $id='';
    public $fname='';
    public $lname='';
    public $address='';
    public $dLicenseNo='';
    public $dLicenseExpDate='';
    public $uname='';
    public $pwd='';

    public function newUser($firstName,$lastName, $address, $dLicenseNo, $dLicenseExpDate, $username, $password){
      $connect = new dbconnect();

      $this->fname = $firstName;
      $this->lname = $lastName;
      $this->address = $address;
      $this->dLicenseNo = $dLicenseNo;
      $this->dLicenseExpDate = $dLicenseExpDate;
      $this->uname = $username;
      $this->pwd = $password;
      $this->id = '003';

      $link = mysqli_query($connect->link, "INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_address`, `user_licenseNo`, `user_licenseExp`,`user_uname`,`user_pwd`)
      VALUES ('$this->id', '$this->fname','$this->lname', '$this->address', '$this->dLicenseNo','$this->dLicenseExpDate', '$this->uname','$this->pwd')");

      return mysqli_affected_rows($connect->link);
    }

    public function getAllUsers(){     //INCOMPLETE FUNCTION 
      $connect = new dbconnect();

      $query = "SELECT * FROM user"
      $queryResults = mysqli_query($connect->link, $query);
    }

    public function loginAuth($username,$password){
      $connect = new dbconnect();

      $message="";
      $query = "SELECT * FROM user WHERE user_uname='" . $username . "' and user_pwd = '". $password."'";
      $result = mysqli_query($connect->link,$query);
      $count  = mysqli_affected_rows($connect->link);
      $user = mysqli_fetch_array($result);
      if($count==0) {
        $message = "Invalid Username or Password!";
      } else {
        $message = "You are successfully authenticated!";
        session_start();
        $_SESSION['id'] = $user['user_id'];
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
