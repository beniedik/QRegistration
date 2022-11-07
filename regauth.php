<?php
include_once 'template/header2.php';
include_once 'template/magic.php';
include_once 'dbconn.php';
?>
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
<h2 class="text-center text-white">Item for Approval</h2>
<div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
        <div id="itemreg-column" class="col-md-12">
            <div id="itemreg-box" class="col-md-12">
                <h3 class="text-center text-info">Item for Approval</h3>
                <div class="form-group">
                    <table class="table table-hover" id="sortableTab">
                        <thead>
                            <tr>
                                <th scope="col">Student Name</th>
                                <th scope="col">Student Number</th>
                                <th scope="col">Item Type</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //include_once 'template/tableheader.php';
                            $getUnauthRegItemQuery = "select u.useritemid, s.studentname, s.studentidnumber, i.itemtypedesc from itemtype i, studentusers s, useritems u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and u.is_forapproval=true and u.is_reviewed <> true and u.is_approved <> true order by u.useritemid asc";
                            $getUnauthRegItemStmt = $dbh->query($getUnauthRegItemQuery) or die(print_r($dbh->errorInfo(), true));

                            foreach ($getUnauthRegItemStmt as $getUnauthRegItemRow) {
                                //
                                $userItemIdent = $getUnauthRegItemRow['useritemid'];
                                $userRealName = $getUnauthRegItemRow['studentname'];
                                $userStudentNumber = $getUnauthRegItemRow['studentidnumber'];
                                $userItemType = $getUnauthRegItemRow['itemtypedesc'];
                            ?>
                                <tr>
                                    <td><?php echo $userRealName; ?></td>
                                    <td><?php echo $userStudentNumber; ?></td>
                                    <td><?php echo $userItemType; ?></td>
                                    <td><a href="viewdetailforapproval.php?id=<?php echo $userItemIdent; ?>"><button>View</button></a></td>
                                </tr>
                            <?php
                            }
                            include_once 'template/tablefooter.php';
                            ?>
                </div>
            </div>
            <div id="itemreg-box" class="col-md-12">
                <a href="useritemreport.php" target="_blank"><button>Report</button></a>
            </div>
            <div id="itemreg-box" class="col-md-12">
                <a href="additemtype.php" target="_blank">Add Item Type</a>
            </div>            
        </div>
    </div>
</div>
<?php
include_once 'template/footer.php';
