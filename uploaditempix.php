<?php
include 'template/header2.php';
include 'template/magic.php';
include 'dbconn.php';

//Upload item pix
$userItemId= $_GET['id'];
$getUerItemDetailQuery = "select s.studentname, s.studentidnumber, i.itemtypedesc as itemtypedesc, u.brand as brand, u.model as model, u.serialnumber as serialnumber, u.color as color from studentusers as s, itemtype as i, useritems as u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and u.useritemid=$userItemId";
$getUerItemDetailStmt = $dbh->query($getUerItemDetailQuery) or die(print_r($dbh->errorInfo(), true));

foreach ($getUerItemDetailStmt as $getUerItemDetailRow) {
    $userIdent = $userItemId;
    $userRealName = $getUerItemDetailRow['studentname'];
    $userStudentNumber = $getUerItemDetailRow['studentidnumber'];
    $itemDesc = $getUerItemDetailRow['itemtypedesc'];
    $itemBrand = $getUerItemDetailRow['brand'];
    $itemModel = $getUerItemDetailRow['model'];
    $itemSN = $getUerItemDetailRow['serialnumber'];
    $itemColor = $getUerItemDetailRow['color'];
?>
        <h2 class="text-center text-white">&nbsp;</h2>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="itemreg-column" class="col-md-6">
                    <div id="itemreg-box" class="col-md-12">
                        <form id="itemreg-form" class="form" action="allowuseritem.php" method="post">
                            <h3 class="text-center text-info">Registered Item Detail Picture Upload</h3>
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
                                </div>
                                <div class="form-group">
                                    <label for="itempicturefront" class="text-info">Item Picture<br/>(Maximum 3 pictures for front, back and serial number):</label><br>
                                    <input type="file" class="form-control-file" id="image" multiple="multiple" name="image[]">
                                </div>						
                                <div id="register-link" class="text-right">
                                    <input class="button expand" type="submit" name="submit" value="Submit">
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
include_once 'template/footer.php';                                


//get item details


//display item details

//UI for pic upload

//redirect to item feedback