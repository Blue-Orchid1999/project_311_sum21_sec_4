<?php
session_start();
if(!isset($_SESSION['email'])){
  header("Location: ../login.php");
}
$user_email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>order slip</title>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css" integrity="sha512-tk4nGrLxft4l30r9ETuejLU0a3d7LwMzj0eXjzc16JQj+5U1IeVoCuGLObRDc3+eQMUcEQY1RIDPGvuA7SNQ2w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>

  <header>
      <a href="#" class="logo"><i class="fas fa-utensils"></i><i><b>CafeExpress</b></i></a>

      <div id="menu-bar" class="fas fa-bars"></div>

      <nav class="navbar">
        <a href="welcome.php">Home</a>
        <a href="items.php">view-items</a>
        <a href="order.php">Order</a>
        <a href="logout.php">Logout</a>
      </nav>
    </header>

    <br><br><br><br><br><br><br>
    <section class="popular" id="popular">
     <h1 class="heading">  Your Order Slips</h1>
     <br><br><br>
      
      
      

<?php
        include('./connection.php');
        $view_order_slip_query = "select * from orders where user_id =(
          select user_id from users where user_email='$user_email' )";
        $run = mysqli_query( $conn,  $view_order_slip_query);
        while ($row = mysqli_fetch_array($run)) {
            $order_no   =  $row[0];
            $user_id    =  $row[1];
            $user_addss =  $row[2];
            $user_phn_no =  $row[3];
            $item_code   =  $row[4];
            $order_date   =  $row[5];
?>

          
      <div class="box-container">
        <div class="box">
          <span class="price">Date: <?=$order_date;?></span>
          <h3>Order no. - <?=$order_no;?></h3>
          <h3 >Item - <?=$item_code;?></h3>
          <h3>User ID - <?=$user_id ;?></h3>
          <h3>Address - <?=$user_addss;?></h3>
          <h3>Phone number - <?=$user_phn_no;?></h3>
          
        </div>
      </div>
    <br><br>
          

<?php
        
      }
?>
        

      
    </section>

    <div class="loader-container">
      <img src="../images/loader.gif" alt="" />
    </div>

    <script src="../js/script.js"></script>
     
  </body>

</html>


