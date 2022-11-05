<?php
include 'dbconn.php';

$req_itemtypeid = $_REQUEST['id'];

$sqlQuery="update req_itemtype set is_denied = TRUE where req_itemtypeid=$req_itemtypeid";

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