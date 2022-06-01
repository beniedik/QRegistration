<?php
include 'template/header.php';
include 'template/magic.php';
include 'dbconn.php';

?>
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
$getItemTypesQuery= "select itemtypeid, itemtypedesc from itemtype";
$getItemTypesStmt= $dbh->query($getItemTypesQuery) or die(print_r($dbh->errorInfo(), true));

foreach($getItemTypesStmt as $getItemTypesRow)
{
    $itemTypeId= $getItemTypesRow['itemtypeid'];
    $itemTypeDesc= $getItemTypesRow['itemtypedesc'];
?>
                                    <option value="<?php echo $itemTypeId; ?>"><?php echo $itemTypeDesc;?></option>
<?php
}
?>                            
                                </select>
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
                    </div> 
                </div>
            </form>
        </div>
<?php
include 'template/footer.php';