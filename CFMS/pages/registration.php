
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    
    
    <link rel="stylesheet" href="../css/style1.css"/>


  </head>

  <body>
      <header>
        <a href="index.php" class="logo"><i class="fas fa-utensils"></i><i><b>CafeExpress</b></i></a>

        <nav class="navbar">
          <a href="index.php"><b> &#x3c Home</b></a>  
        </nav>
      </header>
  

     <div class="login-box" >  
			<h3>Sign Up</h3>
				<form  action="./signup.php" method="post">

          <div class="textbox">
    					<i class="fas fa-user"></i>
              <input type="text" name="name" placeholder="Username"><br>
  					</div>
					
					<div class="textbox">
    					<i class="fas fa-user"></i>
    					<input type="email" name="email" placeholder="E-mail" >
  					</div>
					<div class="textbox">
    					<i class="fas fa-lock"></i>
    					<input type="password" name="pass" placeholder="Password">
  					</div>
					<input type="submit" class="btn" name="register" value="register">
				</form>
				<br>Already registered?</br>
          
        <br><a href="../login.php" class="btn">Sign In</a>
     </div>
  </body>
</html>