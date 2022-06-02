<?php
include_once 'dbconn.php';

$userItem = $_POST['userItem'];
if ($_POST["Submit"] == "Submit") {
    for ($i = 0; $i < sizeof($userItem); $i++) {
        $updateUserItemStatus = "update useritems set is_in=$userItem[$i] where useritemid=$userItem[$i];";
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
