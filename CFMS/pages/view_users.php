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
  <br><br><br><br><br><br><br><br><br><br>
  
    <div id="notice"></div>
    <center>
      <h1>Welcome <?php echo $_SESSION['admin_name'];?> </h1>
      <br><br><br><br><br><br>
    </center>
             

      <?php
      if(isset($_GET['del'])) {
      //  echo 'here';
        echo "<script>$('#notice')
              .show()
              .html('<div>Successfully! <strong> record deleted. </strong> </div>')
              .fadeOut(5000)</script>";
      }
      ?>
    <center>
      <div>
        <input type="text" name="live_search" id="live_search" autocomplete="off" class="btn"
          placeholder="Search user...">
      </div>
    </center>

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
        include('./connection.php');
        $view_users_query = "select * from users";
        $run = mysqli_query( $conn, $view_users_query);
        while ($row = mysqli_fetch_array($run)) {
            $user_id    =  $row[1];
            $user_name  =  $row[0];
            $user_email =  $row[2];
            $user_pass  =  $row[3];

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
        }


        ?>
          </div>
        </div>
        <div id="search_result"></div>
     



      <script type="text/javascript">
        $(document).ready(function () {
            $("#live_search").keyup(function () {
                var query = $(this).val();
                if (query != "") {
                  $(document).click(function(data) {
                      $("#tmp").hide();
                    });
                    $.ajax({
                        url: 'live_search.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function (data) {

                            $('#tmp').html("");
                            $('#search_result').html(data);



                        }
                    });
                } else {
                   $('#tmp').css('display', 'none');
                }
            });
        });
    </script>
  </body>
</html>
