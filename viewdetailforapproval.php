<?php
include_once 'template/header2.php';
include_once 'template/magic.php';
include_once 'dbconn.php';

// Sanitize incoming username and password
$userItemId = $_GET['id'];
//echo "user item ID is $userItemId";
$getUerItemDetailQuery = "select s.studentname, s.studentidnumber, i.itemtypedesc as itemtypedesc, u.brand as brand, u.model as model, u.serialnumber as serialnumber, u.color as color from studentusers as s, itemtype as i, useritems as u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and u.useritemid=$userItemId";
//echo $getUerItemDetailQuery;
//die();
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
<?php
$getItemPix= "select pixurl from useritempix where useritemid=$userItemId";
$getItemPixStmt = $dbh->query($getItemPix) or die(print_r($dbh->errorInfo(), true));
foreach($getItemPixStmt as $itemPixRow)
{  
?>
                                    <li class="list-group-item"><img src="<?php echo $itemPixRow['pixurl'];?>" width="100%" alt="Item Picture"/></li>
<?php
}
?>                                 
                                </ul>
                                <input type="hidden" name="useritemid" value="<?php echo $userIdent;?>">
                                <br />
                                <h6 class="card-subtitle mb-2 text-muted">Approve?</h6>
                                <div>
                                    <button type="submit" class="btn btn-success">Yes</button>
									<br/>	
									<br/>
					 				<button type="submit" id="btn" formaction="denyuseritem.php" class="btn btn-danger" disabled>No</button>
									<br/>
									<label class="form-label" for="denialreason">Reason for not allowing this request</label>
									<textarea class="form-control" id="denialreason" name="denialreason" rows="4" onkeyup="isEmpty()"></textarea> 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function isEmpty(){
            let username = document.getElementById("denialreason").value;

            if (username!=""){
                document.getElementById("btn").removeAttribute("disabled");
            }
        }
    </script>
<?php
}
include_once 'template/footer.php';
