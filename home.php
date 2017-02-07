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
    print_r($userNode);
    ?>
</div>
<div class="container default_container">
    
</div>

</body>
</html>
