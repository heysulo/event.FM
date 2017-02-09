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
<div class="container default_container" style="padding-top: 25px;">

    <div class="col-md-2"></div>
    <div class="col-md-8" style="padding-left: 80px;padding-right: 80px;">
        <br>
        <div class="row page_title" style="text-align: center;">
            Event Created
        </div>
        <p class="text-muted" style="padding: 15px;">
            Your event has being created an the participant can access the event from the link below using the password provided.
        </p>
        <div class="panel panel-default">
            <div class="panel-body ">

                <div class="alert alert-success" id="un_alert_ok" role="alert">Your event is <b>published</b> and the public members who have the password can access the Event page.</b></div>
                <div class="alert alert-warning" id="un_alert_unavailable" role="alert">Your event is <b>UNPUBLISHED</b> and the public members cannot access it. Publish the event from the settings tab of the event administration page so the public members who have the event password can access it.</b></div>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> &nbsp; <b>https://eventfm.azurewebsites.net/</b></span>
                    <input type="text" style="background-color: #fff;" readonly class="form-control" placeholder="Enter Event Password" aria-describedby="sizing-addon1" value="rcw4">
                    <span class="input-group-addon" id="basic-addon2" style="cursor: pointer;" data-toggle="tooltip" title="Copy to clipboard!"><span class="glyphicon glyphicon-copy" aria-hidden="true"></span></span>
                </div>
                <br>

                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp; <b>Event Password</b></span>
                    <input type="text" style="background-color: #fff;" readonly class="form-control" placeholder="Enter Event Password" aria-describedby="sizing-addon1" value="rcw4">
                    <span class="input-group-addon" id="basic-addon2" style="cursor: pointer;" data-toggle="tooltip" title="Copy to clipboard!"><span class="glyphicon glyphicon-copy" aria-hidden="true"></span></span>
                </div>
                <br>
                <p class="text-muted">Participants are required to enter this password when they access the event for the first time. Therefore you will have to share this password with the participants.</p>
                <br>
                <div style="text-align: center">
                    <button type="button" class="btn btn-success btn-lg" style="width: 100%" onclick="location.href = './event.php';">Continue to Event Administration</button>
                    <br>
                    <br>
                    <p class="text-muted">
                        In order to access the this event page, you are required to enter the event password which can be obtained by the event organizers
                    </p>

                </div>
            </div>


        </div>
        <div style="text-align: center">


        </div>
    </div>
    <div class="col-md-2"></div>

</div>

</body>
</html>
