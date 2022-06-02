<?php
include_once 'template/header.php';
include_once 'template/magic.php';
include_once 'dbconn.php';

// Sanitize incoming username and password
$userItemId = $_GET['id'];
//echo "user item ID is $userItemId";
$getUerItemDetailQuery = "select u.useritemid, s.studentname, s.studentidnumber, i.itemtypedesc as itemtypedesc, u.brand as brand, u.model as model, u.serialnumber as serialnumber, u.color as color from studentusers as s, itemtype as i, useritems as u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and u.useritemid=$userItemId";
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
            <?php echo "Item Type: $itemDesc"; ?><br>

            <?php echo "Brand: $itemBrand"; ?><br>
            <?php echo "Model: $itemModel"; ?><br>
            <?php echo "Serial Number: $itemSN"; ?><br>
            <?php echo "Color: $itemColor"; ?><br>
            <p>
                Approve?
                <a href="allowuseritem.php?id=<?php echo $userIdent; ?>"><button>Yes</button></a>&nbsp;<a href="denyuseritem.php?id=<?php echo $userIdent; ?>"><button>No</button></a>
        </div><br>
    </div>
<?php
}
