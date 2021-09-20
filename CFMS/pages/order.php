<?php
session_start();
if(!isset($_SESSION['email'])){
  header("Location: ../login.php");
}
include("connection.php");
  $user_mail = $_SESSION['email'];
  $sql = "select * from users where user_email='$user_mail'";
  $get_user = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($get_user);
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
  
  <header>
      <a href="#" class="logo"><i class="fas fa-utensils"></i><i><b>CafeExpress</b></i></a>

      <div id="menu-bar" class="fas fa-bars"></div>

      <nav class="navbar">
        <a href="welcome.php">Home</a>
        <a href="items.php">view-items</a>
        <a href="order_slips.php">Order-slips</a>
        <a href="logout.php">Logout</a>
      </nav>
    </header>

    <section class="home" id="home">
      <div class="content">
      <section class="order" id="order">
      <h1 class="heading"><span>order</span> now</h1>

      <div class="row">

        <form action="./order_info.php" method="post">
          <div class="inputBox">
            <input type="text" name="name" value="<?=$row['user_name'];?>" />
            <input type="email" name="email" value= "<?=$_SESSION['email']?>" />
          </div>

          <div class="inputBox">
            <input type="tel" name="phn_no" placeholder="0171000000" />
            <input type="number" name="item_code"  placeholder="123" />
          </div>

          <textarea
            placeholder="address"
            name="addss"
            id=""
            cols="30"
            rows="10"
          ></textarea>

          <input type="submit" class="btn" name="order" value="Order">
          
        </form>
      </div>
    </section>

      </div>
    </section>
    <div class="loader-container">
      <img src="../images/loader.gif" alt="" />
    </div>

    <script src="../js/script.js"></script>
     
  </body>

</html>
