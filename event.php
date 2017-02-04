<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once("path.php");
    include_once("head.php");
    ?>
    <title>iHack 2.0 / event.FM</title>
</head>
<body class="defaultbackcolor" style="margin-bottom: 120px;">
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
<div class="container event_container">
    <div class="row">

        <div class="col-xs-12 col-md-3 shoutoutbox">
            <div class="row column_title">
                shout-out a message
            </div>
            <div class="shoutout">
                <textarea class="shoutout_txt_input" maxlength="140" placeholder="Make a shoutout here ..."></textarea>
                <div style="text-align: right;">
                    <button type="button" class="btn btn-success" style="width: 100%;"><span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span> Shoutout</button>
                </div>
            </div>
            <div class="shoutout">
                <div class="so_header">
                    <div class="so_propic"></div>
                    <div class="so_name">Sulochana Kodituwakku</div>
                    <div class="so_timestamp">Saturday, February 4, 2017 at 9:02am</div>
                </div>
                <div class="so_content">Does anyone have a big ass jacket?</div>

            </div>

            <div class="shoutout">
                <div class="so_header">
                    <div class="so_propic"></div>
                    <div class="so_name">Sulochana Kodituwakku</div>
                    <div class="so_timestamp">Saturday, February 4, 2017 at 9:02am</div>
                </div>
                <div class="">Does anyone have a big ass jacket?</div>

            </div>

            <div class="shoutout">
                <div class="so_header">
                    <div class="so_propic"></div>
                    <div class="so_name">Sulochana Kodituwakku</div>
                    <div class="so_timestamp">Saturday, February 4, 2017 at 9:02am</div>
                </div>
                <div class="">Does anyone have a big ass jacket?</div>

            </div>

            <div class="shoutout">
                <div class="so_header">
                    <div class="so_propic"></div>
                    <div class="so_name">Sulochana Kodituwakku</div>
                    <div class="so_timestamp">Saturday, February 4, 2017 at 9:02am</div>
                </div>
                <div class="">Does anyone have a big ass jacket?</div>

            </div>
        </div>
        <div class="col-xs-12 col-md-6" style="padding-top: 10px;">
            <div class="row column_title">
                Current Playlist
            </div>
            <?php include_once ("playlist.php");?>
        </div>
        <div class="col-xs-12 col-md-3">asd asd asdad adad ad</div>
    </div>
</div>
</body>
</html>