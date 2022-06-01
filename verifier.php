<?php
include_once 'template/header.php';
include_once 'template/magic.php';
include_once 'dbconn.php';

// Sanitize incoming username and password
$userItemId= $_GET['id'];

echo "Verifier Page: user item ID is $userItemId";
include_once 'template/footer.php';