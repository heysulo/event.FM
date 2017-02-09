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
    <br>
    <div class="row page_title">
        iHack 2.0 Event Administration
    </div>
    <p class="text-muted">You can manage your event from this page. Keep this page alive and connect your computer to the sound system. Closing or refreshing this tab will disturb the playing processs.</p>
    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/uuZE_IRwLNI" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row column_title">
                now playing
            </div>
            <div class="video_title">Tesla Autopilot Predicts Crash before it happends Compilation [All]</div>
            <br>
            <label for="basic-url">Position 35</label>
            <div class="row" style="padding: 0px 35px 0 15px;">
                <div class="video_requestor">Requested by Sulochana Kodituwakku</div>
                <br>
                <label for="basic-url">User Ratings </label>
                <div class="progressbar_main">
                    <div class="progressbar_value"></div>
                </div>
                <br>
                <label for="basic-url">Skip Vote </label>
                <div class="skip_vote_txt">Need 7 more votes to skip this song</div>
                <div class="progressbar_main">
                    <div class="progressbar_value"></div>
                </div>
            </div>
            <div class="right">
                <br>
                <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-step-backward" aria-hidden="true"></span> Prev </button>
                    <button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-step-forward" aria-hidden="true"></span> Next</button>
                    <button type="button" class="btn btn-danger"> <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Remove</button>

                </div>
            </div>

        </div>
    </div>


    <br>
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span> Playlist</a></li>
        <li role="presentation"><a class="eventadministration_intactive_tab" href="#"><span class="glyphicon glyphicon-music" aria-hidden="true"></span> Song Requests <span class="badge" style="background-color: #f50;">69</span></a></li>
        <li role="presentation"><a class="eventadministration_intactive_tab" href="#"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Shout-outs <span class="badge" style="background-color: #f50;">21</span></a></li>
        <li role="presentation"><a class="eventadministration_intactive_tab" href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings</a></li>
    </ul>
    <div class="row admin_tab_page">
        <?php include("admintabs/settings.php") ?>
    </div>


</div>

</body>
</html>
