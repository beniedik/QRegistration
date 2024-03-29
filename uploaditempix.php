<?php
include 'template/header2.php';
include 'template/magic.php';
include 'dbconn.php';
?>
        <h2 class="text-center text-white">&nbsp;</h2>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="itemreg-column" class="col-md-6">
				<!DOCTYPE html>
				<html>
				<body>
				<center>

				   <!-- The image has scrolling behavior to the upper direction. -->     
					  <img src= "wonderams.ico" alt="wonderams"
					   width="135"
					   height="135"/>

				</center>
				</body>
				</html>
                    <div id="itemreg-box" class="col-md-12">
						<h3 class="text-center text-info">Registered Item Detail Picture Upload</h3>
<?php
//Upload item pix
$userItemId= $_GET['id'];
$getUserItemDetailQuery = "select s.studentname, s.studentidnumber, i.itemtypedesc as itemtypedesc, u.brand as brand, u.model as model, u.serialnumber as serialnumber, u.color as color from studentusers as s, itemtype as i, useritems as u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and u.useritemid=$userItemId";

$getUserItemDetailStmt = $dbh->query($getUserItemDetailQuery) or die(print_r($dbh->errorInfo(), true));

foreach ($getUserItemDetailStmt as $getUserItemDetailRow) {
	$userIdent = $userItemId;
	$userRealName = $getUserItemDetailRow['studentname'];
	$userStudentNumber = $getUserItemDetailRow['studentidnumber'];
	$itemDesc = $getUserItemDetailRow['itemtypedesc'];
	$itemBrand = $getUserItemDetailRow['brand'];
	$itemModel = $getUserItemDetailRow['model'];
	$itemSN = $getUserItemDetailRow['serialnumber'];
	$itemColor = $getUserItemDetailRow['color'];
?>

						<div class="card">
							<div class="card-body">
								<center>
								<h5 class="card-title"><?php echo $userRealName; ?></h5>
								<h6 class="card-subtitle mb-2 text-muted"><?php echo $userStudentNumber; ?></h6>
								</center>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">Item Type: <?php echo $itemDesc; ?></li>
									<li class="list-group-item">Brand: <?php echo $itemBrand; ?></li>
									<li class="list-group-item">Model: <?php echo $itemModel; ?></li>
									<li class="list-group-item">Color: <?php echo $itemColor; ?></li>
									<li class="list-group-item">Serial Number: <?php echo $itemSN; ?></li>
								</ul>

<?php
}
?> 						
								<div class="form-group">						
									<form action="uploaditempix_processor.php" method="post" enctype="multipart/form-data">
										<label for="image">Picture file (in JPEG/JPG, PNG or GIF format and should be less than 500KB)<br/><strong>Upon uploading of your item picture, this item registration will be automatically for review and approval<br/>(Note: for items that have no serial number, upload the picture of the item itself, for the items that have a serial number upload the photo of the serial number)
</strong>:</label>
										<input type="hidden" name="useritemid" id="useritemid" value="<?php echo $userItemId; ?>">
										<input type="file" name="image" id="image">
                                        <br/>
                                        <br/>
										<input type="submit" name="submit" value="Upload Image and Submit Item for Review and Approval">
									</form>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
<?php
include_once 'template/footer.php';									
