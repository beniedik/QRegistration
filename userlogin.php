<?php
//for testing purposes only
//this will be a page where user selects which role can login
require_once("template/header.php");
?>
    <div>
      <h2>Log In</h2>
      <form action="login_processor.php" method="post">
        <div>
          <label>Email</label>
          <input type="text" required>
          <span></span>
        </div>
        <div>
          <label>Password</label>
          <input type="password" required>
          <span></span>
        </div>
        <input type="submit" value="Sign In">
      </form>
    </div>
<?php
require_once("template/footer.php");