<?php
include_once 'template/magic.php';
include_once 'dbconn.php';

$useritemIdNumber = $_REQUEST['useritemid'];
$xp_date= $_REQUEST['xp_date'];

$expiration_date= date('d/M/Y', strtotime($xp_date));
//$real_datetime= date('d/M/Y h:i:s', $expiration_date)

//echo "XP Date is $real_datetime";
//die();

$setUserItemsToAllowed = "update useritems set is_reviewed=true, is_approved=true, validuntil='$expiration_date', approvaldate=NOW() where useritemid=$useritemIdNumber";
//echo $setUserItemsToAllowed;
//die();

try {
    $dbh->beginTransaction();
    $dbh->query($setUserItemsToAllowed);
    $dbh->commit();
} catch (PDOException $e) {
    $dbh->rollback();
    echo "Failed to complete transaction: " . $e->getMessage() . "\n";
    exit;
}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'regauth.php';

//redirect to secured home page (home.php)
header("Location:http://$host$uri/$extra");
