<?php
include 'template/magic.php';
include 'dbconn.php';
include 'config/imageparam.php';

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

/*
extract($_POST);
if(isset($submit))
{
    $allowedExts = array("png", "gif", "jpg", "jpeg");
    $count = count($_FILES['image']['name']);

    for($i=0;$i<$count;$i++)
    {
        $fname = md5($_FILES['image']['name'][$i]);
        $file_tmp = $_FILES['image']['tmp_name'][$i];
        $file_size =  $_FILES['image']['size'][$i];
        $file_type=$_FILES['image']['type'][$i];
        if($fileSize/1024 > "2048") {
            echo "Filesize is not correct it should equal to 2 MB or less than 2 MB.";
            exit();
        }
        $target = $upload_path.$fname;
        //if($file_type== "image/png" || $file_type== "image/gif" || $file_type== "image/jpg" || $file_type== "image/jpeg")
        //{
            move_uploaded_file($file_tmp, $target);
        //}
    }
}*/

if($userItemId > 0)
{
    //echo "User Item ID is $userItemId<br/>";
    //die();
    // Count # of uploaded files in array
    $total = count($_FILES['image']['name']);

    // Loop through each file
    for( $i=0 ; $i < $total ; $i++ ) {

    //Get the temp file path
    $tmpFilePath = $_FILES['image']['tmp_name'][$i];

    //Make sure we have a file path
        if ($tmpFilePath != ""){
            //Setup our new file path
            $newFilePath = "stash/" . $_FILES['image']['name'][$i];

            //Upload the file into the temp dir
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {

                //Handle other code here
                $addItemPixQuery= "insert into useritempix(useritemid, pixurl) values($userItemId, $newFilePath)";
                try
                {
                    $dbh->beginTransaction();
                    $dbh->query($addItemPixQuery);
                    //$userItemId= $dbh->lastInsertId();
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
                $extra = 'itemregtr.php';
        
                //redirect to secured home page (home.php)
                header("Location:http://$host$uri/$extra");
            }
        }
    }
}
/*
$count = count($_FILES['image']['name']);
for($i=0;$i<$count;$i++){
    $file_name = $_FILES["image"]["name"];
    $file_temp_location = $_FILES["image"]["tmp_name"];

    if (!$file_temp_location) {
        echo "ERROR: No file has been selected";
        exit();
    }

    if(move_uploaded_file($file_temp_location, "stash/$file_name")){
        //echo "$file_name upload is complete";
        echo 
        //update DB
        
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'itemregtr.php';

        //redirect to secured home page (home.php)
        header("Location:http://$host$uri/$extra");
    }
    else {
        echo "A server was unable to move the file";
        die();
    }
}
*/