<?php
include_once 'template/header2.php';
include_once 'dbconn.php';

$getUserItemsInCampusQuery = "select s.studentname, s.studentidnumber, i.itemtypedesc as itemtypedesc, u.brand as brand, u.model as model, u.serialnumber as serialnumber, u.color as color from studentusers as s, itemtype as i, useritems as u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and u.is_in=true";
$getUserItemsInCampusStmt = $dbh->query($getUserItemsInCampusQuery) or die(print_r($dbh->errorInfo(), true));
?>
<h2 class="text-center text-white">Item In Premise Report</h2>
<div class="container-fluid">
    <div id="login-row" class="row justify-content-center align-items-center">
        <div id="itemreg-column" class="col-md-12">
            <div id="itemreg-box" class="col-md-12">
                <h3 class="text-center text-info">Item In Premise Report</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Student Name</th>
                                <th scope="col">Student Number</th>
                                <th scope="col">Item Type</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Model</th>
                                <th scope="col">Color</th>
                                <th scope="col">Serial Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($getUserItemsInCampusStmt as $getUserItemsInCampusRow) {
                                $studentName = $getUserItemsInCampusRow['studentname'];
                                $studentIdNumber = $getUserItemsInCampusRow['studentidnumber'];
                                $itemTypeDesc = $getUserItemsInCampusRow['itemtypedesc'];
                                $brand = $getUserItemsInCampusRow['brand'];
                                $model = $getUserItemsInCampusRow['model'];
                                $color = $getUserItemsInCampusRow['color'];
                                $itemSN = $getUserItemsInCampusRow['serialnumber'];
                            ?>
                                <tr>
                                    <td><?php echo $studentName; ?></td>
                                    <td><?php echo $studentIdNumber; ?></td>
                                    <td><?php echo $itemTypeDesc; ?></td>
                                    <td><?php echo $brand; ?></td>
                                    <td><?php echo $model; ?></td>
                                    <td><?php echo $color; ?></td>
                                    <td><?php echo $itemSN; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
include 'template/footer';
