<?php
include_once 'template/header.php';
include_once 'template/magic.php';
include_once 'dbconn.php';
?>
<h2>Registration List For Review</h2>
<div>
<?php
include_once 'template/tableheader.php';
$getUnauthRegItemQuery= "select s.userid, s.studentname, s.studentidnumber, i.itemtypedesc from itemtype i, studentusers s, useritems u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and u.is_approved <> true";
$getUnauthRegItemStmt= $dbh->query($getUnauthRegItemQuery) or die(print_r($dbh->errorInfo(), true));

foreach($getUnauthRegItemStmt as $getUnauthRegItemRow)
{
    $userIdent= $getUnauthRegItemRow['userid'];
    $userRealName= $getUnauthRegItemRow['studentname'];
    $userStudentNumber = $getUnauthRegItemRow['studentidnumber'];
    $userItemType= $getUnauthRegItemRow['itemtypedesc'];
?>
<tr>
    <td><?php echo $userRealName; ?></td>
    <td><?php echo $userStudentNumber; ?></td>
    <td><?php echo $userItemType; ?></td>
    <td><button>View</button></td>
</tr>
<?php
}
include_once 'template/tablefooter.php';
?>

    
</div>
<?php
include_once 'template/footer.php';