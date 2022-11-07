<?php
//for testing purposes only
//this will be a page where user selects which role can login
require_once("template/header.php");
?>
<h2 class="text-center text-white"></h2>
<br />
<br />
<br />
<br />
<br />
<br />
<div class="limiter">
	<div class="container-login100" style="background-image: url('QRegistration/wonderams.ico');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	
	<div id="dropDownSelect1"></div>
<div class="container">
  <div id="login-row" class="row justify-content-center align-items-center">
    <div id="login-column" class="col-md-6">
      <div id="login-box" class="col-md-12">
        <form id="login-form" class="form" action="userlogin_processor.php" method="post">
          <h3 class="text-center text-info">Student Login</h3>
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
