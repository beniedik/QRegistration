<?php
include_once 'dbconn.php';

$userId = $_POST['userid'];
$userItem = $_POST['userItem'];

//update all record by user with false
$setUserItemsToFalse = "update useritems set is_in=false, is_outdate=NOW() where userid=$userId";
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
        $updateUserItemStatus = "update useritems set is_in=true, is_indate=NOW() where useritemid=$userItem[$i];";

        try {
            $dbh->beginTransaction();
            $dbh->query($updateUserItemStatus);
            $dbh->commit();
        } catch (PDOException $e) {
            $dbh->rollback();
            echo "Failed to complete transaction: " . $e->getMessage() . "\n";
            exit;
        }
    }
}
?>
<a href="http://127.0.0.1:5500/exit_qrcodescanner.html">Jump back to QR Code scanner</a>
