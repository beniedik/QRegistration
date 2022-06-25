<?php
include 'template/magic.php';
include 'dbconn.php';

$itemtypeid= $_REQUEST['itemtypeid'];
$itembrand= $_REQUEST['itembrand'];
$itemmodel= $_REQUEST['itemmodel'];
$itemcolor= $_REQUEST['itemcolor'];
$itemsn= $_REQUEST['itemsn'];
$userItemId= 0;

$sqlQuery="insert into useritems(userid, itemtypeid, brand, model, serialnumber, color) values($loggedInUserId, $itemtypeid, '$itembrand', '$itemmodel', '$itemsn', '$itemcolor')";

if($itemtypeid <> '')
{
    try
    {
        $dbh->beginTransaction();
        $dbh->query($sqlQuery);
        $userItemId= $dbh->lastInsertId();
        $dbh->commit();
    }
    catch(PDOException $e)
    {
        $dbh->rollback();
        echo "Failed to complete transaction: " . $e->getMessage() . "\n";
        exit;
    }
}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'itemregtr.php';

//redirect to secured home page (home.php)
header("Location:http://$host$uri/$extra");