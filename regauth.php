<?php
include_once 'template/header.php';
include_once 'template/magic.php';
include_once 'dbconn.php';
?>
<h2>Registration List For Review</h2>
<div>
<?php
include_once 'template/tableheader.php';
$getUnauthRegItemQuery= "select u.useritemid, s.studentname, s.studentidnumber, i.itemtypedesc from itemtype i, studentusers s, useritems u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and u.is_approved <> true order by u.useritemid asc";
$getUnauthRegItemStmt= $dbh->query($getUnauthRegItemQuery) or die(print_r($dbh->errorInfo(), true));

foreach($getUnauthRegItemStmt as $getUnauthRegItemRow)
{
    $userItemIdent= $getUnauthRegItemRow['useritemid'];
    $userRealName= $getUnauthRegItemRow['studentname'];
    $userStudentNumber = $getUnauthRegItemRow['studentidnumber'];
    $userItemType= $getUnauthRegItemRow['itemtypedesc'];
?>
<tr>
    <td><?php echo $userRealName; ?></td>
    <td><?php echo $userStudentNumber; ?></td>
    <td><?php echo $userItemType; ?></td>
    <td><a href="viewdetailsforapproval.php?id=<?php echo $userItemIdent;?>"><button>View</button></a></td>
</tr>
<?php
}
include_once 'template/tablefooter.php';
?>

    
</div>
<?php
include_once 'template/footer.php';