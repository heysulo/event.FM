<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once("path.php");
    include_once("head.php");
    ?>
    <title>iHack 2.0 / event.FM</title>
</head>
<body class="defaultbackcolor" style="margin-bottom: 40px;">
<div class="container">
    <div class="container minstylebar_marg"></div>
    <?php include_once("user_toppane.php") ?>
</div>
<div class="container event_container">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <br>
        <div class="row page_title">
            Create a New Event
        </div>
        <div class="panel panel-primary" style="border-color: #f50">
            <div class="panel-body">
                <label for="basic-url">Basic Event Information </label>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">Event Name</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">Organizer Name</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">Short Description</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>
                <br>
                <label for="basic-url">Select a Username for your event </label>
                <p class="text-muted">You can only have one username for your event and you can't claim a username someone else is already using. Usernames can only contain alphanumeric characters (A-Z, 0-9) or a period (".").
                    Periods (".") and capitalization don't count as a part of a username. For example, johnsmith55, John.Smith55 and john.smith.55 are all considered the same username. Usernames must be at least 5 characters long and can't contain generic terms or extensions (ex: .com, .net).</p>

                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">Event Username</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>
                <br>
                <div class="alert alert-success" role="alert">The Username you selecetd <b>ihack2</b> is available</div>
                <div class="alert alert-danger" role="alert">The Username you selecetd <b>ihack2</b> is not available</div>
                <div class="alert alert-danger" role="alert">The Username you entered is invalid. A username should contain <b>only alphanumeric</b> characters</div>
                <label for="basic-url">Select an Event Banner</label>
                <p class="text-muted">Select an image to be displayed as the even banner. This image should be at least 1170px wide and 200px tall and should be in JPEG file format</p>
                <input class="btn btn-default" type="file" value="Choose File">
                <br>
                <label for="basic-url">Event.FM whitelist</label>
                <p class="text-muted">Event.FM has a list of YouTube videos which are considered as safe and valid songs that can be played in an public event. If you enable this feature once a user requested one of the songs in the whitelist it will be approved without the acknowledgement of the event administrator(The person who creates the event) </p>
                <div class="checkbox">
                    <label><input type="checkbox" value=""> Use Event.FM whitelist</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value=""> Allow Explicit Metirial</label>
                </div>
                <div class="alert alert-warning" role="alert"><b>Warning! Explicit Metirials are allowed. </b>This means if a user requested a song/video which contains explicit metirial and its in our whitelist that request willl be approved without the acknowledgement of the event administrator.</div>
                <p class="text-primary">By clicking Create an Event, you agree to our Terms and confirm that you have read our Data Policy, including our Cookie Use Policy. </p>

            </div>
            <div class="panel-footer">
                <div style="text-align: right;">
                    <button type="button" class="btn btn-success">Create an Event</button>
                    <button type="button" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>

</div>

</body>
</html>
