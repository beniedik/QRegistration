<?php
include 'dbconn.php';

// Sanitize incoming username and password
$username= $_POST['usernameField'];
$password= $_POST['passwordField'];

$loginUsernameQuery="select studentname, studentidnumber from studentusers where username='$username' and userpassword='$password'";
$loginStmt= $dbh->query($loginUsernameQuery) or die(print_r($dbh->errorInfo(), true));

foreach($loginStmt as $loginRow)
{
    $userIdent= $loginRow['id'];
    $userRealName= $loginRow['fullname'];

}

echo $userRealName;
die();