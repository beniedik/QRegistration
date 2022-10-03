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
                                    </tr>
                                    </thead>
                                    <tbody>
<?php
$getItemReviewQuery= "select u.useritemid, i.itemtypedesc as itemtypedesc, u.brand as brand, u.model as model, u.serialnumber as serialnumber, u.color as color, is_forapproval, is_approved, refusal_note from studentusers as s, itemtype as i, useritems as u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and u.is_cancelled=false and u.userid=$loggedInUserId order by u.useritemid asc";
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
                                                Approved (<button  onclick="confirmaActionUnregister()">Unregister This</button>)
<?php
}
else if($isApproved != 1 && $isForApproval !=1 && $refusalNote == "")
{
?>
                                                <a href="uploaditempix.php?id=<?php echo $userItemId; ?>">Upload item pictures</a> (<button onclick="confirmaActionCancel()">Cancel Registration</button> or <button onclick="confirmaActionRedo()">Start Over</button>)
<?php
}
else if($isApproved != 1 && $isForApproval ==1 && $refusalNote == "")
{
?>
                                                Pending (<button onclick="confirmaActionCancel()">Cancel Registration</button> or <button onclick="confirmaActionRedo()">Start Over</button>)
<?php
}
else
{
    echo "DENIED: $refusalNote";

}
?>
                                            </td>
                                        </tr>
<script type="text/javascript">
        function confirmaActionRedo(){
            let confirmActionRedo = confirm("Are you sure you want to continue?");
	if (confirmAction){
		href="itemremovethenregitem.php?id= $userItemId;";
            
        } else {
          
        }
      }
	function confirmaActionCancel(){
            let confirmActionCancel = confirm("Are you sure you want to continue?");
	if (confirmAction){
		href="itemremovethenrefresh.php?id= $userItemId;";
            
        } else {
          
        }
      }
	function confirmaActionUnregister(){
            let confirmActionUnregister = confirm("Are you sure you want to continue?");
	if (confirmAction){
		href="itemremovethenrefresh.php?id= $userItemId;";
            
        } else {
          
        }
      }
    </script>
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
