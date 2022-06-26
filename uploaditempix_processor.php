<?php
if(isset($_POST['submit'])) {           
	foreach($_FILES['image'] as $file){ 
		if ((($file["type"] == "image/jpeg") || ($file["type"] == "image/pjpeg") || (file["type"] == "image/png")) || (file["type"] == "image/gif")))
		{
			if ($file["error"] > 0)
			{
				echo "Return Code: " . $file["error"] . "<br />";
			}
			else
			{
				if (file_exists("upload/" . $file["name"]))
				{
					echo $file["name"] . " already exists. ";
				}
				else
				{
					move_uploaded_file($_FILES["file"]["tmp_name"], "stash/" . $file["name"]);
					echo "Stored in: " . "stash/" . $file["name"];
				}
			}
		}
		else
		{
		echo "Invalid file";
		}
	}
}
//if ($_SERVER['REQUEST_METHOD'] === 'POST')
//if (isset($_POST['submit']))
//{
	//$file_array= array();

	//if (isset($_FILES['image'])) {
	//	$path = 'stash/'; //path you wish to store you uploaded files
	//	$total_files = count($_FILES['image']['name']);
	//	echo "Number of files: $total_files";
	//	die();

		
/*
		for($key = 0; $key < $total_files; $key++)
		{
			$file_name = $_FILES['image']['name'][$key];
			$enc_filename = md5($_FILES['image']['name'][$key]);
			$file_tmp = $_FILES['image']['tmp_name'][$key];
			$file_type = $_FILES['image']['type'][$key];
			$file_ext = strtolower(end(explode('.', $file_name)));
			$file = $path . $enc_filename . "." . $file_ext;
			
			if(move_uploaded_file($file_tmp, $file))
			{
				$file_array[] = $file;
			} else {
				echo 'There was a problem saving the uploaded file';
			}
		}
	}
//}

if(sizeof($file_array) > 0)
{
	var_dump($file_array);
}
else
{
	echo "No file uploaded";
	die();
}
*/
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'itemfeedback.php';

//redirect to secured home page (home.php)
header("Location:http://$host$uri/$extra");