<?php
include 'dbconn.php';

// Sanitize incoming username and password
$username = $_POST['usernameField'];
$password = $_POST['passwordField'];

$loginUsernameQuery = "select userid, staffname, staffidnumber from staffusers where staffusers.username='$username' and staffusers.userpassword='$password'";
$loginStmt = $dbh->query($loginUsernameQuery) or die(print_r($dbh->errorInfo(), true));

foreach ($loginStmt as $loginRow) {
    $staffIdent = $loginRow['userid'];
    $staffRealName = $loginRow['staffname'];
    $userStaffNumber = $loginRow['staffidnumber'];
}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'regauth.php';

//redirect to secured home page (home.php)
header("Location:http://$host$uri/$extra");
