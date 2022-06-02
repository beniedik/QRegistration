<?php
include_once 'template/header.php';
include_once 'dbconn.php';

// Sanitize incoming username and password
$studentIdNumber = $_GET['id'];

echo "Verifier Page: student ID number is $studentIdNumber";
$getStudentDetailsQuery = "select distinct s.studentname, s.studentidnumber from studentusers as s, itemtype as i, useritems as u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and s.studentidnumber='$studentIdNumber'";
echo "$getStudentDetailsQuery<br/>";
$getStudentDetailsStmt = $dbh->query($getStudentDetailsQuery) or die(print_r($dbh->errorInfo(), true));


$getStudentItemsQuery = "select u.useritemid, i.itemtypedesc, u.brand, u.model, u.serialnumber, u.color from studentusers as s, itemtype as i, useritems as u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and s.studentidnumber='$studentIdNumber'";
echo $getStudentItemsQuery;
$getStudentItemsStmt = $dbh->query($getStudentItemsQuery) or die(print_r($dbh->errorInfo(), true));

//print_r($getStudentItemsStmt);
die();

foreach ($getStudentItemsStmt as $getStudentItemsRow) {
    //
}
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
    <div><button>Scan Another</button></div><br>
    <input type="text" placeholder="Student Name"><br>
    <input type="text" placeholder="Student ID">
    <div>
        <div>
            <img>
        </div>
        <div>
            <span>

            </span>
        </div>
        <input type="text" placeholder="Item Type">
        <input type="text" placeholder="Item Information">

        <input type="checkbox">
    </div><br>
    <div>
    </div>
    <?php
    include_once 'template/footer.php';
