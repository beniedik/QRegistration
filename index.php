<?php
//for testing purposes only
//this will be a page where user selects which role can login
require_once("template/header.php");
?>
<div>
  <h2>Log In</h2>
  <form>
    <div>
      <a href="/userlogin.php"><button>Student Login</button></a>
      <span></span>
    </div>
    <div>
      <a href="/staffuserlogin.php"><button>Staff Login</button></a>
      <span></span>
    </div>
  </form>
</div>
<?php
require_once("template/footer.php");
