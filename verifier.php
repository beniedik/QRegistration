<?php
include_once 'template/header2.php';
include_once 'dbconn.php';
?>
<h2 class="text-center text-white">Item Verification</h2>
<div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
        <div id="itemreg-column" class="col-md-12">
            <div id="itemreg-box" class="col-md-12">
                <form id="itemreg-form" class="form" action="verifier_processor.php" method="post">
                    <h3 class="text-center text-info">Item Verification</h3>
                    <form action="verifier_processor.php" method="post">
                        <?php
                        // Sanitize incoming username and password
                        $studentIdNumber = $_GET['id'];

                        $getStudentDetailsQuery = "select distinct s.userid, s.studentname, s.studentidnumber from studentusers as s where s.studentidnumber='$studentIdNumber'";
                        $getStudentDetailsStmt = $dbh->query($getStudentDetailsQuery) or die(print_r($dbh->errorInfo(), true));

                        foreach ($getStudentDetailsStmt as $getStudentDetailsRow) {
                            //
			
                            $studentUserId = $getStudentDetailsRow['userid'];
                            $studentName = $getStudentDetailsRow['studentname'];
                            $studentIdNumber = $getStudentDetailsRow['studentidnumber'];
                        ?>
                            <input type="hidden" name="userid" value="<?php echo $studentUserId; ?>">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $studentName; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $studentIdNumber; ?></h6>
                                </div>
                            </div>

                        <?php
                        }
                        ?>
                        <div class="form-group">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Item Type</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Picture(s)</th>
                                        <th scope="col">(Check box if Item is going inside Campus)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $getStudentItemsQuery = "select u.useritemid, i.itemtypedesc, u.brand, u.model, u.serialnumber, u.color, u.is_in from studentusers as s, itemtype as i, useritems as u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and is_cancelled IS NOT true and u.is_approved=true and s.studentidnumber='$studentIdNumber' order by useritemid asc";
                                    $getStudentItemsStmt = $dbh->query($getStudentItemsQuery) or die(print_r($dbh->errorInfo(), true));

                                    foreach ($getStudentItemsStmt as $getStudentItemsRow) {
                                        //
                                        $userItemId = $getStudentItemsRow['useritemid'];
                                        $itemTypeDesc = $getStudentItemsRow['itemtypedesc'];
                                        $itemBrand = $getStudentItemsRow['brand'];
                                        $itemModel = $getStudentItemsRow['model'];
                                        $itemSN = $getStudentItemsRow['serialnumber'];
                                        $itemColor = $getStudentItemsRow['color'];
                                        $isInStatus = $getStudentItemsRow['is_in'];
                                    ?>
                                        <tr>
                                            <td><?php echo $itemTypeDesc; ?></td>
                                            <td><strong>Brand:</strong><?php echo $itemBrand; ?><br/><strong>Model:</strong><?php echo $itemModel; ?><br/><strong>Color:</strong><?php echo $itemColor; ?><br/><strong>Serial Number:</strong><?php echo $itemSN; ?></td>
                                            <td>
												<?php

												$getItemPix= "select pixurl from useritempix where useritemid='$userItemId'";
												//echo "$getItemPix<br/>";
												//die();
												$getItemPixStmt = $dbh->query($getItemPix) or die(print_r($dbh->errorInfo(), true));
												foreach($getItemPixStmt as $itemPixRow)
												{  
												?>
													<img src="<?php echo $itemPixRow['pixurl'];?>" width="300"><br/>
												<?php
												}
												?>
											</td>
                                            <td>
                                                <input name="userItem[]" value="<?php echo $userItemId;?>" type="checkbox" <?php if ($isInStatus == true) echo "checked"; ?>>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div id="register-link" class="text-right">
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
</head>
<body>

<h2>Animated Button</h2>

<button class="submit"><span>Hover </span></button>

</body>
</html>
                            <input type="submit" name="Submit" value="Submit">
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'template/footer.php';
