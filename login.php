<?php
require_once 'user.php';

if (isset($_POST['login'])){
  $username = $_POST['uname'];
  $password = $_POST['psw'];

  $login = new user();
  $login_msg = $login->loginAuth($username,$password);
  if ($login_msg == "You are successfully authenticated!"){
    header("Location: home.html");
  } else {
    header("Location: index.html");
  }
}
 ?>
