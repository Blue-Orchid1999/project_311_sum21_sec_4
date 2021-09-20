<?php
session_start();
if(!isset($_SESSION['admin_name'])){
  header("Location: ./admin_login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>archive users</title>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css" integrity="sha512-tk4nGrLxft4l30r9ETuejLU0a3d7LwMzj0eXjzc16JQj+5U1IeVoCuGLObRDc3+eQMUcEQY1RIDPGvuA7SNQ2w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/style2.css">
  </head>
  <body>
  <header>
      <a href="#" class="logo"><i class="fas fa-utensils"></i><i><b>CafeExpress</b></i></a>

      <div id="menu-bar" class="fas fa-bars"></div>

      <nav class="navbar">
      
      <a href="view_users.php">User-List</a>
        <a href="logout.php">Log-out</a>
      </nav>
    </header>
  <br><br><br><br><br><br><br><br><br><br><br><br>
  <h1 class="heading">Archived Users</h1>
      <div id="tmp">
      <div class="table-box" >
        <div class="table-row table-head">
            <div class="table-cell ">
                <p>User ID</p>
            </div>
            <div class="table-cell ">
                <p>User Name</p>
            </div>
            <div class="table-cell ">
                <p> User Email</p>
            </div>
            <div class="table-cell ">
                <p>Register-date</p>
            </div>
            <div class="table-cell ">
                <p>Deleted at</p>
            </div>
            
        </div>

        

      
        <?php
        include('./connection.php');
        $view_users_query = "select * from users_archive";
        $run = mysqli_query( $conn, $view_users_query);
        while ($row = mysqli_fetch_array($run)) {
            $user_id    =  $row[1];
            $user_name  =  $row[2];
            $user_email =  $row[3];
            $valid_from  = $row[4];
            $deleted_at  = $row[5];

        ?>
      <div class="table-row">
            <div class="table-cell ">
                <p><?=$user_id;?></p>
            </div>
            <div class="table-cell ">
                <p><?=$user_name;?></p>
            </div>
            <div class="table-cell ">
                <p><?=$user_email;?></p>
            </div>
            <div class="table-cell">
                <p><?=$valid_from;?></p>
            </div>
            <div class="table-cell last-cell">
                <p><?=$deleted_at;?></p>
            </div>   
           
        </div>

        <?php
        }


        ?>
          </div>
        </div>
        </body>
</html>  
     



      