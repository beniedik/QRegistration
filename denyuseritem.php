<?php
include_once 'dbconn.php';

$useritemIdNumber = $_GET['id'];

$setUserItemsToAllowed = "update useritems set is_reviewed=true, is_approved=false where useritemid=$useritemIdNumber";
try {
    $dbh->beginTransaction();
    $dbh->query($setUserItemsToFalse);
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
