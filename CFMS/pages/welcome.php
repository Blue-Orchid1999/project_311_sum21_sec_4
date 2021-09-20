<?php
session_start();
if(!isset($_SESSION['email'])){
  header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Profile</title>
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
      
        <a href="items.php">view-items</a>
        <a href="order.php">Order</a>
        <a href="order_slips.php">Order-slips</a>
        <a href="logout.php">Logout</a>
      </nav>
    </header>

    <section class="home" id="home">
      <div class="content">
        <h3> Welcom To CafeExpress </h3><br>
        <p>we concern about your health and taste.</p>
      </div>
    </section>

    <div class="loader-container">
      <img src="../images/loader.gif" alt="" />
    </div>

    <script src="../js/script.js"></script>
  </body>

</html>
