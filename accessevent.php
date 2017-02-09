<?php define("event.fm_optimus", true);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once("path.php");
    include_once("head.php");
    include_once("facebook.php");
    ?>
    <title>iHack 2.0 / event.FM</title>
</head>
<body class="defaultbackcolor" style="margin-bottom: 40px;">
<div class="container">
    <div class="container minstylebar_marg"></div>
    <?php include_once("user_toppane.php") ?>
</div>
<div class="container event_banner"></div>
<div class="container event_banner_overlay_txt">

    <div class="row">
        <div class="eventname">iHack 2.0</div>
    </div>
    <div class="row">
        <div class="txt_organizer">Organized by University of Colombo School of Computing ISACA Student Group</div>
    </div>
</div>
<div class="container default_container">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="padding-left: 80px;padding-right: 80px;">
        <br>
        <div class="row page_title" style="text-align: center;">
            Event Password
        </div>
        <div class="panel panel-default">
            <div class="panel-body ">
                <span id="invlaidpass">
                    <div class="alert alert-danger" role="alert"><b>The Password you entered is Invalid.</b> Try again</div>
                </span>
                <label for="basic-url">Enter Event Password</label>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                    <input type="password" required  class="form-control" placeholder="Enter Event Password" aria-describedby="sizing-addon1">
                </div>
                <br>
                <div style="text-align: center">
                    <button type="button" class="btn btn-success btn-lg" style="width: 100%">Continue</button>
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
    <div class="col-md-3"></div>

</div>

</body>
</html>
