

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign In</title>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css" integrity="sha512-tk4nGrLxft4l30r9ETuejLU0a3d7LwMzj0eXjzc16JQj+5U1IeVoCuGLObRDc3+eQMUcEQY1RIDPGvuA7SNQ2w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style1.css"/>


  </head>

  <body>
      <header>
        <a href="index.php" class="logo"><i class="fas fa-utensils"></i><i><b>CafeExpress</b></i></a>

        <nav class="navbar">
          <a href="./index.php"><b> &#x3c Home</b></a>  
        </nav>
      </header>
  

     <div class="login-box" >  
			<h3>Sign In</h3>
				<form  action="./pages/signin.php" method="post">
					
					<div class="textbox">
    					<i class="fas fa-user"></i>
    					<input type="email" name="email" placeholder="E-mail" >
  					</div>
					<div class="textbox">
    					<i class="fas fa-lock"></i>
    					<input type="password" name="pass" placeholder="Password">
  					</div>
					<input type="submit" class="btn" name="login" value="login">
				</form>
				<br>Don't have any account yet?</br>
				<br><a href="./pages/registration.php" class="btn">Sign Up Here</a>
     </div>
  </body>
</html>