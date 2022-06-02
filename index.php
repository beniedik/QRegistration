<?php
//for testing purposes only
//this will be a page where user selects which role can login
require_once("template/header.php");
?>
<div>
  <h2>Log In</h2>
  <form>
    <div>
      <button><a href="/userlogin.php">Student Login</a></button>
      <span></span>
    </div>
    <div>
      <button><a href="/staffuserlogin.php">Staff Login</a></button>
      <span></span>
    </div>
  </form>
</div>
<?php
require_once("template/footer.php");
