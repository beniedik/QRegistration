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
<div class="container">
  <div id="login-row" class="row justify-content-center align-items-center">
    <div id="login-column" class="col-md-6">
      <div id="login-box" class="col-md-12">
        <form id="login-form" class="form" action="" method="post">
          <h3 class="text-center text-info">Choose Login</h3>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Please choose which user type will login</h5>
              <h6 class="card-subtitle mb-2 text-muted"></h6>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <div class="form-group">
                    <a href="userlogin.php"><button type="button" class="btn btn-info">Student Login</button></a>
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-info"><a href="staffuserlogin.php">Staff Login</a></button>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
require_once("template/footer.php");
