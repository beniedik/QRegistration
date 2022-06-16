<?php
include 'dbconn.php';

$itemtype= $_REQUEST['itemtype'];
$itemTypeDesc = addslashes($itemtype);

$sqlQuery="insert into itemtype(itemtypedesc) values('$itemTypeDesc')";

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