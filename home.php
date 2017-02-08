<?php define("event.fm_optimus", true);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    include_once("path.php");
    if (!isset($_SESSION['facebook_access_token'])) {
        $_SESSION['rdr'] = $_SERVER['HTTP_HOST']."/".$_SERVER['PHP_SELF'];
        //header('Location: '.$host."login.php");
    }
    include_once("head.php");
    include_once("facebook.php");
    ?>
    <title>iHack 2.0 / event.FM</title>
</head>
<body class="defaultbackcolor" style="margin-bottom: 40px;">
<div class="container">
    <div class="container minstylebar_marg"></div>
    <?php include_once("user_toppane.php");
    ?>

</div>
<div class="container default_container">
    <div class="row" style="padding: 20px">
        <div class="row page_title" >
            Home
        </div>

        <p class="text-muted">Select an image to be displayed as the even banner. This image should be at least 1170px wide and 200px tall and should be in JPEG file format</p>
    </div>
    <div class="col-md-4">
        <div class="row column_title">
            Events You accessed
        </div>
        <div class="row">
            <?php include ("hometabs/participated.php");?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row column_title">
            Your events

        </div>
        <div class="row">
            <?php include ("hometabs/participated.php");?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row column_title">
            latest events
        </div>
        <div class="row">
            <?php include ("hometabs/participated.php");?>
        </div>
    </div>
    
</div>

</body>
</html>
