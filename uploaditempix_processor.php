<?php
if (isset($_FILES['image'])) {
	$file_array= array();
	$path = 'stash/'; //path you wish to store you uploaded files
	$total_files = count($_FILES['image']['name']);
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

$userItemId= $_POST['useritemid'];