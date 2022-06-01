<?php
include 'template/magic.php';
include 'dbconn.php';

//$loggedInUserId= $_SESSION['userId'];
//$loggedInUserRealname= $_SESSION['realName'];
//$loggedStudentNumber= $_SESSION['studnumber'];

$itemtypeid= $_POST['itemtypeid'];
$itembrand= $_POST['itembrand'];
$itemmodel= $_POST['itemmodel'];
$itemcolor= $_POST['itemcolor'];
$itemsn= $_POST['itemsn'];

echo "$loggedInUserId $itemtypeid $itembrand $itemmodel $itemcolor $itemsn";
die();