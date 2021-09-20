<?php
include("connection.php");
if (isset($_POST['order'])) {

  $user_name  =  $_POST['name'];
  $user_email =  $_POST['email'];
  $user_phn_no  = $_POST['phn_no'];
  $item_code  =  $_POST['item_code'];
  $user_addss  =  $_POST['addss'];

  $get_user_id = "select user_id from users where user_email ='$user_email' ";
  $user_id = mysqli_query($conn,$get_user_id );
  $row = mysqli_fetch_assoc( $user_id);
  $id = $row['user_id'];


  if ($user_phn_no== '') {
    echo "<script>alert('Please enter your mobile number')</script>";
    echo "<script>window.open('./order.php','_self')</script>";
    exit();
  }
  if ($user_addss == '') {
    echo "<script>alert('Please enter your address')</script>";
    echo "<script>window.open('./order.php','_self')</script>";
    exit();
  }
  if ($item_code == '') {
    echo "<script>alert('Please enter the item-code you want to order')</script>";
    echo "<script>window.open('./order.php','_self')</script>";
    exit();
  }

  $check_item_code = "select * from items where item_code='$item_code'";
  $run_query =  mysqli_query($conn, $check_item_code);
  if (mysqli_num_rows($run_query) <= 0) {
    echo "<script>alert('The Code  $item_code  is invalid, please enter correct code!')</script>";
    echo "<script>window.open('./order.php','_self')</script>";
    exit();
  }

  $insert_order = "insert into orders (user_id, user_addss,user_phn_no, item_code)
  value ('$id', '$user_addss', '$user_phn_no', '$item_code')";

   if(mysqli_query($conn, $insert_order)){
     echo "<script>window.open('./order_slip.php','_self')</script>";
   }

}else {
  echo "<script>window.open('./order.php','_self')</script>";
}

?>

