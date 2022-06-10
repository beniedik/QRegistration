<?php
include 'template/header2.php';
include 'template/magic.php';
include 'dbconn.php';
?>
        <h2 class="text-center text-white">&nbsp;</h2>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="itemreg-column" class="col-md-12">
                    <div id="itemreg-box" class="col-md-12">
                        <form id="itemreg-form" class="form" action="http://192.168.1.106/QRegistration/itemregtr_processor.php" method="post">
                            <h3 class="text-center text-info">Item Registration Review Feedback</h3>
                            <div class="form-group">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Item Type</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Color</th>
                                        <th scope="col">Serial #</th>
                                        <th scope="col">Feedback</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
								<a href="itemregtr.php" class="text-info">Back to Item Registration</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                                