<?php
include 'dbconn.php';

// Sanitize incoming username and password
$username= $_POST['usernameField'];
$password= $_POST['passwordField'];

$loginUsernameQuery="select userid, studentname, studentidnumber from studentusers where username='$username' and userpassword='$password'";
$loginStmt= $dbh->query($loginUsernameQuery) or die(print_r($dbh->errorInfo(), true));

foreach($loginStmt as $loginRow)
{
    $userIdent= $loginRow['userid'];
    $userRealName= $loginRow['studentname'];
    $userStudentNumber = $loginRow['studentidnumber'];

}

if($userIdent <> '' && $userRealName <> '' && $userStudentNumber <> '')
{
    $isLoggedIn=TRUE;

    session_start();
    $_SESSION['userId']= $userIdent;
    $_SESSION['realName']= $userRealName;
    $_SESSION['studnumber']= $userStudentNumber;
    $_SESSION['isLoggedIn']=$isLoggedIn;

    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'studenthome.php';

    //redirect to secured home page (home.php)
    header("Location:http://$host$uri/$extra");
}
else
{
    header("Location:$_SERVER[HTTP_REFERER]?msg=1");
}


