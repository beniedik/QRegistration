<?php
include_once 'template/magic.php';
include_once 'dbconn.php';

$useritemIdNumber = $_REQUEST['useritemid'];
$refusalnote = $_REQUEST['denialreason'];

if($_REQUEST['denialreason'] != "")
{
    $setUserItemsToAllowed = "update useritems set refusal_note=$refusalnote,is_reviewed=true, is_approved=false, approvaldate=NOW() where useritemid=$useritemIdNumber";

    try {
        $dbh->beginTransaction();
        $dbh->query($setUserItemsToAllowed);
        $dbh->commit();
    } catch (PDOException $e) {
        $dbh->rollback();
        echo "Failed to complete transaction: " . $e->getMessage() . "\n";
        exit;
    }

    $extra = 'regauth.php';
}
else
{

    $extra = 'viewdetailforapproval.php?id=$useritemIdNumber'
}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');


//redirect to secured home page (home.php)
header("Location:http://$host$uri/$extra");
