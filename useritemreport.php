<?php
include 'dbconn.php';

$getUserItemsInCampusQuery = "select s.studentname, s.studentidnumber, i.itemtypedesc as itemtypedesc, u.brand as brand, u.model as model, u.serialnumber as serialnumber, u.color as color from studentusers as s, itemtype as i, useritems as u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and u.is_in=true";
$getUserItemsInCampusStmt = $dbh->query($getUserItemsInCampusQuery) or die(print_r($dbh->errorInfo(), true));
include 'template/reporttableheader.php';

foreach ($getUserItemsInCampusStmt as $getUserItemsInCampusRow) {
    $studentName = $getUserItemsInCampusRow['studentname'];
    $studentIdNumber = $getUserItemsInCampusRow['studentidnumber'];
    $itemTypeDesc = $getUserItemsInCampusRow['itemtypedesc'];
    $brand = $getUserItemsInCampusRow['brand'];
    $model = $getUserItemsInCampusRow['model'];
    $color = $getUserItemsInCampusRow['color'];
    $itemSN = $getUserItemsInCampusRow['serialnumber'];
?>
    <tr>
        <td><?php echo $studentName; ?></td>
        <td><?php echo $studentIdNumber; ?></td>
        <td><?php echo $itemTypeDesc; ?></td>
        <td><?php echo $brand; ?></td>
        <td><?php echo $model; ?></td>
        <td><?php echo $color; ?></td>
        <td><?php echo $itemSN; ?></td>
    </tr>
<?php
}

include 'template/tablefooter.php';
