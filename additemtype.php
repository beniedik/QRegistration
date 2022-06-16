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
                        <form id="itemreg-form" class="form" action="additemtype_processor.php" method="post">
                            <h3 class="text-center text-info">Add Item Type</h3>
                            <div class="form-group">
                                <label for="brand" class="text-info">Item Type Name:</label><br>
                                <input type="text" name="itemtype" id="itemtype" class="form-control">
                            </div>
							<div id="register-link" class="text-right">
								<a href="#" class="text-info"><button type="button" class="btn btn-primary">Submit</button></a>
							</div>						                                                   
                        </form>
						<div>
						<p>

						</p>
						</div>
						<div>
							<a href="regauth.php" class="text-info">Back to Item Review</a>
						</div>
                    </div>
                </div>
            </div>

        </div>                            