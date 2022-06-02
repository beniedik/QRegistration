<?php
include_once 'template/header.php';
include_once 'dbconn.php';
?>
<h2>Information Screen</h2>
<div>
    <div>
        <img>
    </div>
    <div>
        <span>

        </span>
    </div>
    <?php
    // Sanitize incoming username and password
    $studentIdNumber = $_GET['id'];

    $getStudentDetailsQuery = "select distinct s.studentname, s.studentidnumber from studentusers as s where s.studentidnumber='$studentIdNumber'";
    $getStudentDetailsStmt = $dbh->query($getStudentDetailsQuery) or die(print_r($dbh->errorInfo(), true));

    foreach ($getStudentDetailsStmt as $getStudentDetailsRow) {
        //
        $studentName = $getStudentDetailsRow['studentname'];
        $studentIdNumber = $getStudentDetailsRow['studentidnumber'];
    ?>
        <?php echo "Student Name: $studentName"; ?><br>
        <?php echo "Student ID Number: $studentIdNumber"; ?><br>
        <br />

    <?php
    }

    $getStudentItemsQuery = "select u.useritemid, i.itemtypedesc, u.brand, u.model, u.serialnumber, u.color from studentusers as s, itemtype as i, useritems as u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and s.studentidnumber='$studentIdNumber'";
    $getStudentItemsStmt = $dbh->query($getStudentItemsQuery) or die(print_r($dbh->errorInfo(), true));

    foreach ($getStudentItemsStmt as $getStudentItemsRow) {
        //
        $userItemId = $getStudentItemsRow['useritemid'];
        $itemTypeDesc = $getStudentItemsRow['itemtypedesc'];
        $itemBrand = $getStudentItemsRow['brand'];
        $itemModel = $getStudentItemsRow['model'];
        $itemSN = $getStudentItemsRow['serialnumber'];
        $itemColor = $getStudentItemsRow['color'];
    ?>
        <div>
            <?php echo "Item Type: $itemTypeDesc"; ?><br>
            <?php echo "Brand: $itemBrand"; ?><br>
            <?php echo "Model: $itemModel"; ?><br>
            <?php echo "Color: $itemColor"; ?><br>
            <?php echo "Item S/N: $itemSN"; ?><br>
            <input id="<?php echo $userItemId; ?>" type="checkbox">
        </div><br>
    <?php
    }
    ?>
    <div>
    </div>
    <?php
    include_once 'template/footer.php';
