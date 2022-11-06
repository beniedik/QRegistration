<?php
//for testing purposes only
//this will be a page where user selects which role can login
require_once("template/header.php");
?>
<h2 class="text-center text-white"></h2>
<br />
<br />
<head>
  <title>
    Staff Login
  </title>
  <link rel="icon" type ="image/x-icon" href="QRegistration-master/wonderams.png"/>
</head>
<br />
<br />
<br />
<br />
<div class="container">
  <div id="login-row" class="row justify-content-center align-items-center">
    <div id="login-column" class="col-md-6">
      <div id="login-box" class="col-md-12">
        <form id="login-form" class="form" action="staffuserlogin_processor.php" method="post">
          <h3 class="text-center text-info">Staff Login</h3>
          <div class="form-group">
            <label for="username" class="text-info">Username:</label><br>
            <input type="text" name="usernameField" id="usernameField" placeholder="Username" class="form-control">
          </div>
          <div class="form-group">
            <label for="password" class="text-info">Password:</label><br>
            <input type="password" name="passwordField" id="passwordField" placeholder="Password" class="form-control">
          </div>
          <div id="register-link" class="text-right">
            <!--<a href="#" class="text-info"><button type="button" class="btn btn-primary">Login</button></a>-->
            <input class="button expand" type="submit" value="Sign In">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--
<div>
  <h2>Staff Log In</h2>
  <form action="staffuserlogin_processor.php" method="post">
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
