<?php
include 'template/magic.php';
include 'dbconn.php';

extract($_POST);
if(isset($submit))
{
    $allowedExts = array("png", "gif", "jpg", "jpeg");
    $count = count($_FILES['image']['name']);

    for($i=0;$i<$count;$i++)
    {
        $fname = $_FILES['image']['name'][$i];
        $file_tmp = $_FILES['image']['tmp_name'][$i];
        $file_size =  $_FILES['image']['size'][$i];
        $file_type=$_FILES['image']['type'][$i];
        if($fileSize/1024 > "2048") {
            //Its good idea to restrict large files to be uploaded.
            echo "Filesize is not correct it should equal to 2 MB or less than 2 MB.";
            exit();
        } //FileSize Checking
        //echo $file_size,$file_type;
        $target = "stash/".$fname;
        if($file_type== "image/png" || $file_type== "image/gif" && $file_type== "image/jpg" && $file_type== "image/jpeg" && $count <= 3)
        {
            move_uploaded_file($file_tmp, $target);
        }       
        img_{{$i}} = $target;
    }

    $itemtypeid= $_REQUEST['itemtypeid'];
    $itembrand= $_REQUEST['itembrand'];
    $itemmodel= $_REQUEST['itemmodel'];
    $itemcolor= $_REQUEST['itemcolor'];
    $itemsn= $_REQUEST['itemsn'];

    $sqlQuery="insert into useritems(userid, itemtypeid, brand, model, serialnumber, color, img_0, img_1, img_2) values($loggedInUserId, $itemtypeid, '$itembrand', '$itemmodel', '$itemsn', '$itemcolor', '$img_0', '$img_1', '$img_3')";
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
}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'itemregtr.php';

//redirect to secured home page (home.php)
header("Location:http://$host$uri/$extra");