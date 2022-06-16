<?php
include 'dbconn.php';

$itemtypeid = $_GET['id'];

$sqlQuery= "update itemtype set is_discontinued=true where itemtypeid=$itemtypeid";

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
$extra = 'additemtype.php';

//redirect to secured home page (home.php)
header("Location:http://$host$uri/$extra");