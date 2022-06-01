<?php
session_start();
if(isset($_SESSION['userId']) && isset($_SESSION['realName']) && isset($_SESSION['studnumber']))
{
    $loggedInUserId= $_SESSION['userId'];
    $loggedInUserRealname= $_SESSION['realName'];
    $loggedStudentNumber= $_SESSION['studnumber'];
    $isLoggedIn= $_SESSION['isLoggedIn'];
}
else
{
    session_unset();  
    session_destroy();

    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location:http://$host$uri/");
}