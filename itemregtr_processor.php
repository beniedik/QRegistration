<?php
include 'template/magic.php';
include 'dbconn.php';

echo "What?";

if((isset($_REQUEST['itemtypeid']) && ($_REQUEST['itemtypeid'] > 0)) && (isset($_REQUEST['itemmodel']) && ($_REQUEST['itemcolor'] > 0)) && (isset($_REQUEST['itemsn'])) && (isset($_FILES['itempicturefront'])) && (isset($_FILES['itempictureback'])) && (isset($_FILES['itempicturesn'])))
{
    echo "Hello";

    if (isset($_FILES['itempicturefront']))
    {
        $errors = [];
        $path = $upload_path;
        $extensions = ['jpg, png, gif, webp'];
        $filefront_name = $_FILES['itempicturefront']['name'];
        $enc_filenamefront = md5($_FILES['itempicturefront']['name']);
        $filefront_tmp = $_FILES['itempicturefront']['tmp_name'];
        $filefront_type = $_FILES['itempicturefront']['type'];
        $filefront_size = $_FILES['itempicturefront']['size'];
        $filefront_ext = strtolower(end(explode('.', $filefront_name)));
        $filefront = $path . $enc_filenamefront . "." . $filefront_ext;
    }

    if (isset($_FILES['itempictureback']))
    {
        $errors = [];
        $path = $upload_path;
        $extensions = ['jpg, png, gif, webp'];
        $fileback_name = $_FILES['itempictureback']['name'];
        $enc_filenameback = md5($_FILES['itempictureback']['name']);
        $fileback_tmp = $_FILES['itempictureback']['tmp_name'];
        $fileback_type = $_FILES['itempictureback']['type'];
        $fileback_size = $_FILES['itempictureback']['size'];
        $fileback_ext = strtolower(end(explode('.', $fileback_name)));
        $fileback = $path . $enc_filenameback . "." . $fileback_ext;
    }

    if (isset($_FILES['itempicturesn']))
    {
        $errors = [];
        $path = $upload_path;
        $extensions = ['jpg, png, gif, webp'];
        $filesn_name = $_FILES['itempicturesn']['name'];
        $enc_filenamesn = md5($_FILES['itempicturesn']['name']);
        $filesn_tmp = $_FILES['itempicturesn']['tmp_name'];
        $filesn_type = $_FILES['itempicturesn']['type'];
        $filesn_size = $_FILES['itempicturesn']['size'];
        $filesn_ext = strtolower(end(explode('.', $filesn_name)));
        $filesn = $path . $enc_filenamesn . "." . $filesn_ext;
    }

    //echo "Hi!";

    $itemtypeid= $_REQUEST['itemtypeid'];
    $itembrand= $_REQUEST['itemtypeid'];
    $itemmodel= $_REQUEST['itemmodel'];
    $itemcolor= $_REQUEST['itemcolor'];
    $itemsn= $_REQUEST['itemsn'];

    $sqlQuery="insert into useritems(userid, itemtypeid, brand, model, serialnumber, color, img_front, img_back, img_sn) values($loggedInUserId, $itemtypeid, '$itembrand', '$itemmodel', '$itemsn', '$itemcolor', '$filefront', '$fileback', '$filesn')";

    if($itemtypeid <> '')
    {
        try
        {
            $dbh->beginTransaction();
            $dbh->query($sqlQuery);
            $dbh->commit();
        }
        catch(PDOException $e)
        {
            $dbh->rollback();
            echo "Failed to complete transaction: " . $e->getMessage() . "\n";
            exit;
        }
    }

    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'itemregtr.php';

    //redirect to secured home page (home.php)
    header("Location:http://$host$uri/$extra");
}

