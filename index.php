<?php define("event.fm_optimus", true);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include_once("path.php");
        if (isset($_SESSION['facebook_access_token'])) {
            header('Location: '.$host."home.php");
        }
        $_SESSION['rdr'] = $host."home.php";
        include_once("head.php");
    ?>
    <title>event.FM</title>
</head>
<body class="defaultbackcolor">
<div class="container">

    <div class="container minstylebar"></div>
    <div class="container welcomebanner" ></div>
    <div class="container main_container">
        <div class="home_logo_area"></div>
        <p class="intro_title">Introduction</p>
        <p class="intro_txt">Spotify gives you instant access to millions of songs – from old favorites to the latest hits. Just hit play to stream anything you like.</p>
        <button type="button" class="loginbtn" onclick="location.href = 'login.php';">Login with Facebook</button>
        <?php include_once ("footer.php");
        echo $_SESSION['rdr'];?>

    </div>
</div>
</body>
</html>