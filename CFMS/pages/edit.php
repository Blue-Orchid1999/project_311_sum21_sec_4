<?php
session_start();
if(!isset($_SESSION['admin_name'])){
  header("Location: ./admin_login.php");
}


include("connection.php");
  $user_id = $_GET['id'];
  $sql = "select * from users where user_id='$user_id'";
  $get_user = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($get_user);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>edit</title>

    <link rel="stylesheet" href="../css/style2.css">

    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css" 
  integrity="sha512-tk4nGrLxft4l30r9ETuejLU0a3d7LwMzj0eXjzc16JQj+5U1IeVoCuGLObRDc3+eQMUcEQY1RIDPGvuA7SNQ2w==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="../css/style.css" />
    
  </head>
  <body>
  <header>
      <a href="#" class="logo"><i class="fas fa-utensils"></i><i><b>CafeExpress</b></i></a>

      <div id="menu-bar" class="fas fa-bars"></div>

      <nav class="navbar">
      <a href="view_users.php">User-List</a>
        <a href="user_archive.php">User-Archive</a>
        <a href="logout.php">Log-out</a>
      </nav>
    </header>
    <br><br><br><br><br><br>
    <section class="order" id="order">
    <h1 class="heading">Please Update Here</h1>

    <div class="row">

        <form action="./update.php?id=<?=$row['user_id'];?>" method="post">
          <div class="inputBox">
          <h2>user Name :</h2> <input  type="text" name="username" value="<?=$row['user_name'];?>"> <br>
          
          </div>
          <div class="inputBox">
          
          <h2>user email:</h2> <input  type="email" name="email" value="<?=$row['user_email'];?>"> <br>
          </div>

          
          <input type="submit" class="btn" name="update" value="update" >
          
        </form>
      </div>
</section>
</body>
</html>
<!--
  <div class="table-box">
    <div class="table-row">
        <form  action="./update.php?id=<?=$row['user_id'];?>" method="post">
            <div class="table-cell ">
                  User Name : <input class="btn" type="text" name="username" value="<?=$row['user_name'];?>"><br>
            </div>
            <div class="table-cell ">
                User Email : <input class="btn" type="email" name="email" value="<?=$row['user_email'];?>"><br>
            </div>
            <div class="table-cell last-cell">
              <button class="btn" >
                <input type="submit" name="update" value="update" >
            </button>
            </div>
            
    </form>     
  </div>
</div>            
</body>
</html>

-->