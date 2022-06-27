<?php
include 'dbconn.php';

$useritemid = $_GET['id'];

$sqlQuery= "update useritems set is_cancelled=true where is_in <> true and useritemid=$useritemid";

//for troubleshooting purposes only
//echo $sqlQuery;
//die();

try
{
    $dbh->beginTransaction();
    $dbh->query($sqlQuery);
    $dbh->commit();
}
catch(PDOException $e)
{
    $dbh->rollback();
    echo "Failed to complete transaction: " . $e->getMessage() . "\n";
    exit;
}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'itemfeedback.php';

//redirect to secured home page (home.php)
header("Location:http://$host$uri/$extra");