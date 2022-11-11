<?php
include 'template/header2.php';
include 'template/magic.php';
include 'dbconn.php';
?>
<!DOCTYPE html>
<html>
  
<body>
<center>

   <!-- The image has scrolling behavior to the upper direction. -->
   <marquee  behavior="slide" direction="down">         
          <img src= "wonderams.ico" alt="wonderams"
	   width="100"
	   height="100"/>
    </marquee>  
</center>
</body>
</html>
        <h2 class="text-center text-white">&nbsp;</h2>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="itemreg-column" class="col-md-12">
                    <div id="itemreg-box" class="col-md-12">
                        <form id="itemreg-form" class="form" action="itemregtr_processor.php" method="post">
                            <h3 class="text-center text-info">Item Registration Review Feedback</h3>
                            <div class="form-group">
                                <table class="table table-hover" id="sortableTab">
                                    <thead>
                                    <tr>
                                        <th scope="col">Item Type</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Color</th>
                                        <th scope="col">Serial #</th>
                                        <th scope="col">Feedback</th>
										<th scope="col">Registration Date</th>
										<th scope="col">Review Date</th>
										<th scope="col">Valid Until</th>
                                    </tr>
                                    </thead>
                                    <tbody>
<?php
$getItemReviewQuery= "select u.useritemid, i.itemtypedesc as itemtypedesc, u.brand as brand, u.model as model, u.serialnumber as serialnumber, u.color as color, is_forapproval, is_approved, refusal_note, u.approvaldate, u.item_reg_date, u.validuntil from studentusers as s, itemtype as i, useritems as u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and u.is_cancelled=false and u.userid=$loggedInUserId order by u.useritemid asc";
$getItemReviewStmt = $dbh->query($getItemReviewQuery) or die(print_r($dbh->errorInfo(), true));

foreach ($getItemReviewStmt as $getItemReviewRow)
{
    $userItemId = $getItemReviewRow['useritemid'];
    $itemTypeDesc = $getItemReviewRow['itemtypedesc'];
    $itemBrand = $getItemReviewRow['brand'];
    $itemModel = $getItemReviewRow['model'];
    $itemSN = $getItemReviewRow['serialnumber'];
    $itemColor = $getItemReviewRow['color'];
    $isForApproval = $getItemReviewRow['is_forapproval'];
    $isApproved = $getItemReviewRow['is_approved'];
    $refusalNote = $getItemReviewRow['refusal_note'];
	
	date_default_timezone_set('Asia/Manila');
	
	if($getItemReviewRow['approvaldate'] != "")
	{
		$revDate = date("j F Y, H:i:s",strtotime($getItemReviewRow['approvaldate']));
	}
	else
	{
		$revDate = "";
	}
	
	if($getItemReviewRow['item_reg_date'] != "")
	{
		$regDate = date("j F Y, H:i:s",strtotime($getItemReviewRow['item_reg_date']));
	}
	else
	{
		$regDate = "";
	}
	
	if($getItemReviewRow['validuntil'] != "")
	{
		$validityDate = date("j F Y",strtotime($getItemReviewRow['validuntil']));
	}
	else
	{
		$validityDate = "";
	}
	
	
    $feedBack = $isApproved;
?>
                                        <tr>
                                            <td><?php echo $itemTypeDesc; ?></td>
                                            <td><?php echo $itemBrand; ?></td>
                                            <td><?php echo $itemModel; ?></td>
                                            <td><?php echo $itemColor; ?></td>
                                            <td><?php echo $itemSN; ?></td>
                                            <td>
<?php
if($isApproved == 1)
{
?>
                                                Approved <a href="itemremovethenrefresh.php?id=<?php echo $userItemId; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to continue?')">Unregister This</a>
<?php
}
else if($isApproved != 1 && $isForApproval !=1 && $refusalNote == "")
{
?>
                                                <a href="uploaditempix.php?id=<?php echo $userItemId; ?>">Upload item pictures</a> <a href="itemremovethenrefresh.php?id=<?php echo $userItemId; ?>"class="btn btn-danger" onclick="return confirm('Are you sure you want to continue?')">Cancel Registration</a> or <a href="itemremovethenregitem.php?id=<?php echo $userItemId; ?>"class="btn btn-danger" onclick="return confirm('Are you sure you want to continue?')">Start Over</a>
<?php
}
else if($isApproved != 1 && $isForApproval ==1 && $refusalNote == "")
{
?>
                                                Pending <a href="itemremovethenrefresh.php?id=<?php echo $userItemId; ?>"class="btn btn-danger" onclick="return confirm('Are you sure you want to continue?')">Cancel Registration</a> or <a href="itemremovethenregitem.php?id=<?php echo $userItemId; ?>"class="btn btn-danger" onclick="return confirm('Are you sure you want to continue?')">Start Over</a>
<?php
}
else
{
    echo "DENIED: $refusalNote";

}
?>
                                            </td>
											<td><?php echo $regDate; ?></td>
											<td><?php echo $revDate; ?></td>
											<td><?php echo $validityDate; ?></td>											
                                        </tr>
					    <?php
}
?>
                                    </tbody>
                                </table>
								<a href="itemregtr.php" class="text-info">Back to Item Registration</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                                
