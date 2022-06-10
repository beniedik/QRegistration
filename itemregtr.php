<?php
include 'template/header2.php';
include 'template/magic.php';
include 'dbconn.php';
?>
        <h2 class="text-center text-white">&nbsp;</h2>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="itemreg-column" class="col-md-6">
                    <div id="itemreg-box" class="col-md-12">
						<h3 class="text-center text-info">Item Registration</h3>
						<div class="card">
							<div class="card-body">
								<form id="itemreg-form" class="form" action="http://192.168.1.106/QRegistration/itemregtr_processor.php" method="post">
									<div class="form-group">
										<label for="brand" class="text-info">Item Type:</label><br>
										<select class="form-control" name="itemtypeid" id="itemTypeField" required="">
											<option value="">Select Your Option</option>
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
                                    <div class="form-group">
                                        <label for="itempicturefront" class="text-info">Item Picture (front):</label><br>
                                        <input type="file" class="form-control-file" id="itempicturefront">
                                    </div>
                                    <div class="form-group">
                                        <label for="itempictureback" class="text-info">Item Picture (back):</label><br>
                                        <input type="file" class="form-control-file" id="itempictureback">
                                    </div>
                                    <div class="form-group">
                                        <label for="itempicturesn" class="text-info">Item Picture (Serial Number):</label><br>
                                        <input type="file" class="form-control-file" id="itempicturesn">
                                    </div>							
                                    <div id="register-link" class="text-right">
                                        <input class="button expand" type="submit" value="Submit">
                                    </div>
                                </form>
                                <br/>
                                <br/>
								<div>
									<a href="itemfeedback.php" class="text-info">Item Registration Review Feedback</a>
								</div>
								</div>
						</div>
					</div>
                </div>
			</div>
		</div>
<?php
include 'template/footer.php';
