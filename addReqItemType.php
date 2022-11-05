<?php
include 'dbconn.php';

$req_itemtypeid = $_REQUEST['id'];

//get req item type desc
$getItemTypeDesc = "select req_itemtypedesc from req_itemtype where req_itemtypeid=$req_itemtypeid";
$getitemTypeStmt = $dbh->query($getItemTypeDesc) or die(print_r($dbh->errorInfo(), true));
$itemTypeDesc = $getitemTypeStmt->fetch();
//print_r($itemTypeDesc);
//die();

//insert into item type DB
$sqlQuery = "insert into itemtype(itemtypedesc) values('$itemTypeDesc[0]')";

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

//update req_itemtype table
$sqlQuery = "update req_itemtype set is_approved=true where req_itemtypeid=$req_itemtypeid";

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