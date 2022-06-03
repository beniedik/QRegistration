<?php
include 'template/header2.php';
include 'template/magic.php';
include 'dbconn.php';
?>
<h2 class="text-center text-white">Item Registration</h2>
<div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
        <div id="itemreg-column" class="col-md-6">
            <div id="itemreg-box" class="col-md-12">
                <form id="itemreg-form" class="form" action="itemregtr_processor.php" method="post">
                    <h3 class="text-center text-info">Item Registration</h3>
                    <div class="form-group">
                        <label for="itemType" class="text-info">Item Type:</label><br>
                        <select class="form-control" name="itemtypeid" id="itemTypeField" required="">
                            <?php
                            $getItemTypesQuery = "select itemtypeid, itemtypedesc from itemtype";
                            $getItemTypesStmt = $dbh->query($getItemTypesQuery) or die(print_r($dbh->errorInfo(), true));

                            foreach ($getItemTypesStmt as $getItemTypesRow) {
                                $itemTypeId = $getItemTypesRow['itemtypeid'];
                                $itemTypeDesc = $getItemTypesRow['itemtypedesc'];
                            ?>
                                <option value="<?php echo $itemTypeId; ?>"><?php echo $itemTypeDesc; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="brand" class="text-info">Brand:</label><br>
                        <input name="itembrand" type="text" placeholder="e.g. Lenovo" id="brand" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="model" class="text-info">Model:</label><br>
                        <input name="itemmodel" type="text" placeholder="e.g. Thinkpad" id="model" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="color" class="text-info">Color:</label><br>
                        <input name="itemcolor" type="text" placeholder="e.g. Black" id="color" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="color" class="text-info">Serial Number:</label><br>
                        <input name="itemsn" type="text" placeholder="e.g. ABC123" id="serialnumber" class="form-control">
                    </div>
                    <div id="register-link" class="text-right">
                        <input class="button expand" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--
<div>
            <header><h2>Item Registration</h2></header>
            <form action="itemregtr_processor.php" method="post">
                <div>
                    <div>
                        <h4>Item Details</h4>
                        <div>
                            <div>
                                <label>Item</label>
                                <select name="itemtypeid" id="itemTypeField" required>
                                    <option value="">Select Your Option</option>
<?php
/*
$getItemTypesQuery= "select itemtypeid, itemtypedesc from itemtype";
$getItemTypesStmt= $dbh->query($getItemTypesQuery) or die(print_r($dbh->errorInfo(), true));

foreach($getItemTypesStmt as $getItemTypesRow)
{
    $itemTypeId= $getItemTypesRow['itemtypeid'];
    $itemTypeDesc= $getItemTypesRow['itemtypedesc'];*/
?>
                                    <!--<option value="<?php echo $itemTypeId; ?>"><?php echo $itemTypeDesc; ?></option>-->
<?php
/*
}
*/
?>
<!--                                </select>
                            </div>
                            
                            <div>
                                <label>Brand</label>
                                <input name="itembrand" type="text" placeholder="e.g. Lenovo" required>
                            </div>

                            <div>
                                <label>Model</label>
                                <input name="itemmodel" type="text" placeholder="e.g. Thinkpad" required>
                            </div>

                            <div>
                                <label>Color</label>
                                <input name="itemcolor" type="text" placeholder="e.g. Black" required>
                            </div>

                            <div>
                                <label>Serial Number</label>
                                <input name="itemsn" type="text" placeholder="e.g. ABC123" required>
                            </div>
                        </div>
              <button>Submit</button>
                        <input class="button expand" type="submit" value="Submit">
                    </div> 
                </div>
            </form>
        </div>-->
<?php
include 'template/footer.php';
