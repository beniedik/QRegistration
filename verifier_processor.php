<?php
include_once 'dbconn.php';

$userId = $_POST['userid'];
$userItem = $_POST['userItem'];

//update all record by user with false
$setUserItemsToFalse = "update useritems set is_in=false where userid=$userId";
try {
    $dbh->beginTransaction();
    $dbh->query($setUserItemsToFalse);
    $dbh->commit();
} catch (PDOException $e) {
    $dbh->rollback();
    echo "Failed to complete transaction: " . $e->getMessage() . "\n";
    exit;
}

if ($_POST["Submit"] == "Submit") {
    for ($i = 0; $i < sizeof($userItem); $i++) {



        $updateUserItemStatus = "update useritems set is_in=true where useritemid=$userItem[$i];";
        //echo $updateUserItemStatus;
        //echo "<br/>";
        try {
            $dbh->beginTransaction();
            $dbh->query($updateUserItemStatus);
            $dbh->commit();
        } catch (PDOException $e) {
            $dbh->rollback();
            echo "Failed to complete transaction: " . $e->getMessage() . "\n";
            exit;
        }

        //$query="INSERT INTO employee (name) VALUES ('" .$userItem[$i]. "')";
        //mysql_query($query) or die(mysql_error());
        echo "$userItem[$i]<br/>";
    }
    //echo "Record is inserted";
}

echo "Changes saved, close this browser tab";
