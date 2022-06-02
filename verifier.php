<?php
include_once 'template/header.php';
include_once 'dbconn.php';
?>
<h2>Information Screen</h2>
<form action="verifier_processor.php" method="post">
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

        $getStudentDetailsQuery = "select distinct s.userid, s.studentname, s.studentidnumber from studentusers as s where s.studentidnumber='$studentIdNumber'";
        $getStudentDetailsStmt = $dbh->query($getStudentDetailsQuery) or die(print_r($dbh->errorInfo(), true));

        foreach ($getStudentDetailsStmt as $getStudentDetailsRow) {
            //
            $studentUserId = $getStudentDetailsRow['userid'];
            $studentName = $getStudentDetailsRow['studentname'];
            $studentIdNumber = $getStudentDetailsRow['studentidnumber'];
        ?>
            <input type="hidden" name="userid" value="<?php echo $studentUserId; ?>"><br />
            <?php echo "Student Name: $studentName"; ?><br />
            <?php echo "Student ID Number: $studentIdNumber"; ?><br />
            <br />

        <?php
        }

        $getStudentItemsQuery = "select u.useritemid, i.itemtypedesc, u.brand, u.model, u.serialnumber, u.color, u.is_in from studentusers as s, itemtype as i, useritems as u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and u.is_approved=true and s.studentidnumber='$studentIdNumber' order by useritemid asc";
        $getStudentItemsStmt = $dbh->query($getStudentItemsQuery) or die(print_r($dbh->errorInfo(), true));

        foreach ($getStudentItemsStmt as $getStudentItemsRow) {
            //
            $userItemId = $getStudentItemsRow['useritemid'];
            $itemTypeDesc = $getStudentItemsRow['itemtypedesc'];
            $itemBrand = $getStudentItemsRow['brand'];
            $itemModel = $getStudentItemsRow['model'];
            $itemSN = $getStudentItemsRow['serialnumber'];
            $itemColor = $getStudentItemsRow['color'];
            $isInStatus = $getStudentItemsRow['is_in'];
        ?>
            <div>
                <?php echo "Item Type: $itemTypeDesc"; ?><br>
                <?php echo "Brand: $itemBrand"; ?><br>
                <?php echo "Model: $itemModel"; ?><br>
                <?php echo "Color: $itemColor"; ?><br>
                <?php echo "Item S/N: $itemSN"; ?><br>
                <input name="userItem[]" value="<?php echo $userItemId; ?>" type="checkbox" <?php if ($isInStatus == 'TRUE') {
                                                                                                echo "checked";
                                                                                            }; ?>>
            </div><br>
        <?php
        }
        ?>
        <input type="submit" name="Submit" value="Submit">
        <div>
        </div>
</form>
<?php
include_once 'template/footer.php';
