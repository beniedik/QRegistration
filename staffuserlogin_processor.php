<?php
include 'template/magic.php';
include 'dbconn.php';

// Sanitize incoming username and password
$username= $_POST['usernameField'];
$password= $_POST['passwordField'];

$loginUsernameQuery="select userid, staffname, staffidnumber, staffroleid from staffusers where username='$username' and userpassword='$password'";
$loginStmt= $dbh->query($loginUsernameQuery) or die(print_r($dbh->errorInfo(), true));

foreach($loginStmt as $loginRow)
{
    $staffIdent= $loginRow['userid'];
    $staffRealName= $loginRow['staffname'];
    $userStaffNumber = $loginRow['staffidnumber'];
    $staffRoleId= $loginRow['staffroleid'];

}

if($userIdent <> '' && $userRealName <> '' && $userStudentNumber <> '')
{
    $isLoggedIn=TRUE;

    session_start();
    $_SESSION['userId']= $staffIdent;
    $_SESSION['realName']= $staffRealName;
    $_SESSION['studnumber']= $userStaffNumber;
    $_SESSION['isLoggedIn']=$isLoggedIn;

    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    if($staffRoleId == 1)
    {
        $extra = 'regauth.php';
    }
    elseif($staffRoleId == 2)
    {
        $extra = 'verifier.php';
    }

    //redirect to secured home page (home.php)
    header("Location:http://$host$uri/$extra");
}
else
{
    header("Location:$_SERVER[HTTP_REFERER]?msg=1");
}


