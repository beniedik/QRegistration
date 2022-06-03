<?php
include_once 'template/header2.php';
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
    <h2 class="text-center text-white">Item Approval</h2>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="itemreg-column" class="col-md-6">
                <div id="itemreg-box" class="col-md-12">
                    <h3 class="text-center text-info">Item Approval</h3>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $userRealName; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $userStudentNumber; ?></h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Item Type: <?php echo $itemDesc; ?></li>
                                <li class="list-group-item">Brand: <?php echo $itemBrand; ?></li>
                                <li class="list-group-item">Model: <?php echo $itemModel; ?></li>
                                <li class="list-group-item">Color: <?php echo $itemColor; ?></li>
                                <li class="list-group-item">Serial Number: <?php echo $itemSN; ?></li>
                            </ul>
                            <br />
                            <h6 class="card-subtitle mb-2 text-muted">Approve?</h6>
                            <p>
                                <a href="allowuseritem.php?id=<?php echo $userIdent; ?>" class="card-link"><button type="button" class="btn btn-success">Yes</button></a>
                                <a href="denyuseritem.php?id=<?php echo $userIdent; ?>" class="card-link"><button type="button" class="btn btn-danger">No</button></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
include_once 'template/footer.php';
