<?php
include_once 'template/header.php';
include_once 'template/magic.php';
include_once 'dbconn.php';

// Sanitize incoming username and password
$userItemId= $_POST['id'];
echo "user item ID is $userItemId";