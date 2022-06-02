<?php
include_once 'template/header.php';
include_once 'template/magic.php';
include_once 'dbconn.php';

// Sanitize incoming username and password
$userItemId = $_GET['id'];
//echo "user item ID is $userItemId";
$getUerItemDetailQuery = "select u.useritemid, s.studentname, i.itemtypedesc, u.brand, u.model, u.serialnumber, u.color from studentusers as s, itemtype as i, useritems as u where u.userid=s.userid and u.itemtypeid=i.itemtypeid and u.useritemid=$userItemId";
echo $getUerItemDetailQuery;
