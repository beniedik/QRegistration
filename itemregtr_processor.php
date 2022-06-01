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

$sqlQuery="insert into useritems(userid, itemtypeid, brand, model, serialnumber, color) values($loggedInUserId, $itemtypeid, '$itembrand', '$itemmodel', '$itemsn', '$itemcolor')";

if($itemtypeid <> '')
{
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
}

$urlComponents = explode("?", $_SERVER[HTTP_REFERER]);
if($actionId==1)
{
    //
    header("Location:$urlComponents[0]?msg=$actionId");
}
elseif($actionId==2)
{
    //
    header("Location:$urlComponents[0]?userid=$userId&msg=$actionId");
}