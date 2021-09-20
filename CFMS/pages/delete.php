<?php
session_start();
if(!isset($_SESSION['admin_name'])){
  header("Location: ./admin_login.php");
}

include("connection.php");
  $user_id = $_GET['id'];
  $sql = "delete from users where user_id='$user_id'";
  $delete = mysqli_query($conn, $sql);
  if ($delete) {
    echo "<script>window.open('./view_users.php?del=user has been deleted','_self')</script>";
  }
?>
