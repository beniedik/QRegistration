<?php
$target_dir = "stash/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["image"]["tmp_name"]);
	if($check !== false) {
		//echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
}

// Check if file already exists
if (file_exists($target_file)) {
	echo "Sorry, file already exists.";
	$uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
	echo "Sorry, your file is too large.";
	$uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}
else
{
	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		include 'dbconn.php';
		$userItemId = $_POST['useritemid'];

		//enter $target_file to db
		$insertToItemPixQuery= "insert into useritempix(useritemid, pixurl) values($userItemId, $target_file)";
		try
		{
			$dbh->beginTransaction();
			$dbh->query($insertToItemPixQuery);
			$dbh->commit();
		}
		catch(PDOException $e)
		{
			$dbh->rollback();
			echo "Failed to complete transaction: " . $e->getMessage() . "\n";
			exit;
		}

		//update is_forapproval to true
		$updateUserItemQuery= "update useritems set is_forapproval=true where useritemid=$userItemId";
		try
		{
			$dbh->beginTransaction();
			$dbh->query($updateUserItemQuery);
			$dbh->commit();
		}
		catch(PDOException $e)
		{
			$dbh->rollback();
			echo "Failed to complete transaction: " . $e->getMessage() . "\n";
			exit;
		}

		//jump to itemfeedback
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'itemfeedback.php';

		//redirect to secured home page (home.php)
		header("Location:http://$host$uri/$extra");	
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}