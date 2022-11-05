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
						<h3 class="text-center text-info">Request Additional Item Type</h3>
						<div class="card">
							<div class="card-body">
								<form enctype=”multipart/form-data” id="itemreg-form" class="form" action="req_add_itemtype_processor.php" method="post">
									<div class="form-group">
										<div class="form-group">
											<label for="brand" class="text-info">Requested Item Type Name:</label><br>
											<input type="text" name="itemtype" id="itemtype" class="form-control">
										</div>
										<div id="register-link" class="text-right">
											<input class="button expand" type="submit" value="Submit">
										</div>																				
									</div>
								</form>
								<div>
									<p>Your request will be subject for review and approval before they appear on the list of Item Type</p>
								</div>
							</div>
						</div>
					</div>
                </div>
			</div>
		</div>								
<?php
include 'template/footer.php';
