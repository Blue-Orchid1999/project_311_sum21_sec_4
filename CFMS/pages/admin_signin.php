<?php

include("connection.php");
if (isset($_POST['admin_login'])) {

  $admin_name =  $_POST['admin_name'];
  $admin_pass  = $_POST['admin_pass'];

  if ($admin_name  == '') {
    echo "<script>alert('Please enter the username')</script>";
    echo "<script>window.open('./admin_login.php','_self')</script>";
    exit();
  }
  if ($admin_pass == '') {
    echo "<script>alert('Please enter the password')</script>";
    echo "<script>window.open('./admin_login.php','_self')</script>";
    exit();
  }

  $check_user = "select * from admin where admin_name ='$admin_name'   AND admin_pass='$admin_pass'";
  $query = mysqli_query($conn,$check_user );
  if(mysqli_num_rows($query)){
    session_start();
    $_SESSION['admin_name'] = $admin_name;

    echo "<script>window.open('./view_users.php','_self')</script>";

  }else{
    echo "<script>alert('Email or password is incorrect!')</script>";
    echo "<script>window.open('./admin_login.php','_self')</script>";
  }

}else {
  echo "<script>window.open('./admin_login.php','_self')</script>";
}



?>
