<?php
include 'template/magic.php';
include 'dbconn.php';

extract($_POST);
if(isset($submit))
{
    $count = count($_FILES['image']['name']);
    for($i=0; $i<$count; $i++)
    {
        $fname = $_FILES['image']['name'][$i];
        $file_tmp = $_FILES['image']['tmp_name'][$i];
        $file_size =  $_FILES['image']['size'][$i];
        $file_type=$_FILES['image']['type'][$i];
        echo $file_size,$file_type;         
        $target = "img/".$fname;
        move_uploaded_file($file_tmp,$target);
        echo "uploaded succ !"."<br>";
        //$img_$$i = $target;
        //echo $img_$$i;
    }
}
//die();
/*
$itemtypeid= $_REQUEST['itemtypeid'];
$itembrand= $_REQUEST['itembrand'];
$itemmodel= $_REQUEST['itemmodel'];
$itemcolor= $_REQUEST['itemcolor'];
$itemsn= $_REQUEST['itemsn'];

$sqlQuery="insert into useritems(userid, itemtypeid, brand, model, serialnumber, color, img_0, img_1, img_2) values($loggedInUserId, $itemtypeid, '$itembrand', '$itemmodel', '$itemsn', '$itemcolor', '$img_0', '$img_1', '$img_2')";
echo $sqlQuery;
die();

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
//}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'itemregtr.php';

//redirect to secured home page (home.php)
header("Location:http://$host$uri/$extra");