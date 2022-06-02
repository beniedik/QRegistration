<?php
include_once 'template/header.php';
include_once 'template/magic.php';
include_once 'dbconn.php';

// Sanitize incoming username and password
$userItemId = $_GET['id'];
//echo "user item ID is $userItemId";
$getUerItemDetailQuery = "select u.useritemid, s.studentname, s.studentidnumber, i.itemtypedesc, u.brand, u.model, u.serialnumber, u.color from studentusers as s, itemtype as i, useritems as u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and u.useritemid=$userItemId";
$getUerItemDetailStmt = $dbh->query($getUerItemDetailQuery) or die(print_r($dbh->errorInfo(), true));

foreach ($getUerItemDetailStmt as $getUerItemDetailRow) {
    $userIdent = $getUerItemDetailRow['useritemid'];
    $userRealName = $getUerItemDetailRow['studentname'];
    $userStudentNumber = $getUerItemDetailRow['studentidnumber'];
    $itemDesc = $getUerItemDetailRow['itemtypedesc'];
    $itemBrand = $getUerItemDetailRow['brand'];
    $itemModel = $getUerItemDetailRow['model'];
    $itemSN = $getUerItemDetailRow['serialnumber'];
    $itemColor = $getUerItemDetailRow['color'];
?>
    <h2>Registration Details</h2>
    <div>
        <div>
            <img>
        </div>
        <div>
            <span>

            </span>
        </div>
        <?php echo $userRealName; ?><br>
        <?php echo $userStudentNumber; ?>
        <div>
            <div>
                <img>
            </div>
            <div>
                <span>

                </span>
            </div>
            <input type="text" placeholder="Item Type">
            <button>Approve</button><br>
            <input type="text" placeholder="Item Information">
            <button>Deny</button>
        </div><br>
        <div><button>Back</button></div>
    </div>
<?php
}
