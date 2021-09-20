<?php
  require_once "./connection.php";

  if (isset($_POST['query'])) {
    $q = $_POST['query'];
      $query = "SELECT * FROM users WHERE user_name LIKE '$q%' LIMIT 100";
      $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>view users</title>
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
      <a href="user_archive.php">User-Archive</a>
        <a href="logout.php">Logout</a>
      </nav>
    </header>

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
                <p>User Email</p>
            </div>
            <div class="table-cell ">
                <p>User-Password</p>
            </div>
            <div class="table-cell ">
                <p>remove/edit?</p>
            </div>
            
        </div>

<?php

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
          $user_id    =  $row[0];
          $user_name  =  $row[1];
          $user_email =  $row[2];
          $user_pass  =  $row[3];
          $_SESSION['email'] = $user_email;

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
                <p><?=$user_pass;?></p>
            </div>
            <div class="table-cell last-cell">
                <a href="./delete.php?id=<?=$user_id;?>">
                  <button class="btn" onclick="return confirm('Are you sure?');"> Delete </button></a>
                <a href="./edit.php?id=<?=$user_id;?>">
                <button class="btn" > Edit </button></a>
            </div>   
           
        </div>

        <?php

          } } else {

            ?>

            <center>
                  <br><br> <h2> User Not Found </h2>
            </center>
          
            
            <?php
               }
            ?>

          </div>
        </div>
      </body>
  </html>


   <?php
  }
  ?>      


