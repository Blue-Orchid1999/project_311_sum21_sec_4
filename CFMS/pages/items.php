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
    <title>items</title>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css" integrity="sha512-tk4nGrLxft4l30r9ETuejLU0a3d7LwMzj0eXjzc16JQj+5U1IeVoCuGLObRDc3+eQMUcEQY1RIDPGvuA7SNQ2w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>
  <?=$_SESSION['email']?>
  <header>
      <a href="#" class="logo"><i class="fas fa-utensils"></i><i><b>CafeExpress</b></i></a>

      <div id="menu-bar" class="fas fa-bars"></div>

      <nav class="navbar">
        <a href="welcome.php">Home</a>
        <a href="order.php">Order</a>
        <a href="order_slips.php">Order-slips</a>
        <a href="logout.php">Logout</a>
      </nav>
    </header>
    <br><br><br><br><br><br>
    <section class="popular" id="popular">
    <h1 class="heading"> Our <span> Food Items </span></h1>
      <div class="box-container">

<?php
        include('./connection.php');
       // $item_code = 124;
        $view_item_query = "select * from items";
        //where item_code = $item_code";
        $run = mysqli_query( $conn,  $view_item_query);
        while ($row = mysqli_fetch_array($run)) {
            $item_name   =  $row[0];
            $item_code    =  $row[1];
            $item_price =  $row[4];
            $item_pic =  $row[5];
            
?>
     
        <div class="box">
          <span class="price">&#2547 <?=$item_price;?></span>
          <img src="../images/<?=$item_pic;?>" alt="" />
          <h3><?=$item_name;?></h3>
          <h3 >Code: <?=$item_code;?></h3>
          <a href="order.php" class="btn">order now</a>
        </div>
      

<?php
    // $item_code = $item_code + 1;

    }
?>
        


     
        </div>
    </section>

    <div class="loader-container">
      <img src="../images/loader.gif" alt="" />
    </div>

    <script src="../js/script.js"></script>
     
  </body>

</html>

