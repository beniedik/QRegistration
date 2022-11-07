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
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="itemreg-column" class="col-md-6">
					<div id="itemreg-box" class="col-md-12">
                        <form id="itemreg-form" class="form" action="additemtype_processor.php" method="post">
                            <h3 class="text-center text-info">Add Item Type</h3>
                            <div class="form-group">
                                <label for="brand" class="text-info">Item Type Name:</label><br>
                                <input type="text" name="itemtype" id="itemtype" class="form-control">
                            </div>
							<div id="register-link" class="text-right">
                                <input class="button expand" type="submit" value="Submit">
							</div>						                                                   
                        </form>					
						<div  class="row">
							<div class="col-md-7">
								<p>
<?php
//list of existing item type, we can delete them from here
$itemTypeQuery = "select itemtypeid, itemtypedesc from itemtype where is_discontinued=false order by itemtypedesc asc";
$itemTypeStmt = $dbh->query($itemTypeQuery) or die(print_r($dbh->errorInfo(), true));

foreach ($itemTypeStmt as $itemTypeStmtRow) {
    $itemTypeId = $itemTypeStmtRow['itemtypeid'];
    $itemTypeDesc = $itemTypeStmtRow['itemtypedesc'];
?>
                            <a href="discontinueItemType.php?id=<?php echo $itemTypeId;?>">Remove</a> <?php echo $itemTypeDesc;?></option><br/>
<?php
}
?>

							<a href="regauth.php" class="text-info">Back to Item Review</a>								
								</p>
							</div>
							<div class="col-md-5">
								<p>
									<label for="brand" class="text-info">Requested Item Type(s)</label><br>
<?php
//list of existing item type, we can delete them from here
$reqItemTypeQuery = "select req_itemtypeid, req_itemtypedesc from req_itemtype where is_approved is NULL and is_denied is NULL order by req_itemtypedesc asc";
$req_itemTypeStmt = $dbh->query($reqItemTypeQuery) or die(print_r($dbh->errorInfo(), true));

foreach ($req_itemTypeStmt as $req_itemTypeStmtRow) {
    $itemTypeId = $req_itemTypeStmtRow['req_itemtypeid'];
    $itemTypeDesc = $req_itemTypeStmtRow['req_itemtypedesc'];
?>
                            <?php echo $itemTypeDesc;?>&nbsp; <a href="addReqItemType.php?id=<?php echo $itemTypeId;?>">Approve</a>&nbsp; / &nbsp;<a href="remReqItemType.php?id=<?php echo $itemTypeId;?>">Deny</a></option><br/>
<?php
}
?>						
								</p>
							</div>
						</div>
					</div>
                </div>
            </div>

        </div> 				
