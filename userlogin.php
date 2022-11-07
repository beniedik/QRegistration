<?php
//for testing purposes only
//this will be a page where user selects which role can login
require_once("template/header.php");
?>
<!DOCTYPE html>
<html>
  
<body>
<center>

   <!-- The image has scrolling behavior to the upper direction. -->
   <marquee  behavior="slide" direction="down">         
          <img src= "wonderams.ico" alt="wonderams"
	   width="100"
	   height="100"/>
    </marquee>  
</center>
</body>
</html>
<h2 class="text-center text-white"></h2>
<br />
<br />
<br />
<br />
<br />
<br />
<div class="container">
 
  <div id="login-row" class="row justify-content-center align-items-center">
    <div id="login-column" class="col-md-6">
      <div id="login-box" class="col-md-12">
        <form id="login-form" class="form" action="userlogin_processor.php" method="post">
	
          <h3 class="text-center text-info">Student Login</h3>
		
          <div class="form-group">
		 
            <label for="username" class="text-info">Username:</label><br>
            <input type="text" name="usernameField" id="usernameField" placeholder="Username" class="form-control" required/>
          </div>
          <div class="form-group">
            <label for="password" class="text-info">Password:</label><br>
            <input type="password" name="passwordField" id="passwordField" placeholder="Password" class="form-control" required/>
          </div>
          <div id="register-link" class="text-right">
            <!--<a href="#" class="text-info"><button type="button" class="btn btn-primary">Login</button></a>-->
            <input class="button expand" type="submit" value="Sign In" required/>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</div>
<!--
    <div>
      <h2>Student Log In</h2>
      <form action="userlogin_processor.php" method="post">
        <div>
          <label>Email</label>
          <input type="text" name="usernameField" id="usernameField" placeholder="Username" required>
          <span></span>
        </div>
        <div>
          <label>Password</label>
          <input type="password" name="passwordField" id="passwordField" placeholder="Password" required>
          <span></span>
        </div>
        <input class="button expand" type="submit" value="Sign In">
      </form>
    </div>
-->
<?php
require_once("template/footer.php");
