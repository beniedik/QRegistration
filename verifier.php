<?php
include_once 'template/header.php';
include_once 'dbconn.php';

// Sanitize incoming username and password
$studentIdNumber = $_GET['id'];

echo "Verifier Page: student ID number is $studentIdNumber";
?>
<h2>Information Screen</h2>
<div>
    <div>
        <img>
    </div>
    <div>
        <span>

        </span>
    </div>
    <div><button>Scan Another</button></div><br>
    <input type="text" placeholder="Student Name"><br>
    <input type="text" placeholder="Student ID">
    <div>
        <div>
            <img>
        </div>
        <div>
            <span>

            </span>
        </div>
        <input type="text" placeholder="Item Type">
        <input type="text" placeholder="Item Information">

        <input type="checkbox">
    </div><br>
    <div>
    </div>
    <?php
    include_once 'template/footer.php';
