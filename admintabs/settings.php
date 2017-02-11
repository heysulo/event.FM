<?php
define("event.fm_optimus", true);
session_start();
include_once("../path.php");
include_once("../database/database.php");
include_once("../facebook.php");
$username = null;
$row = null;
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $query = "SELECT * FROM event WHERE username=\"".mysqli_real_escape_string($conn,$username)."\" and organizerID = ".$userNode->getId();
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result)==1){
        $row = mysqli_fetch_assoc($result);
    }else{
        die("forbidden");
    }
}else{
    die("null");
}
?>
<div class="row page_title">
    Event Settings
</div>
<div class="row" name="settings_cont" id="settings_cont" style="padding: 25px;">

    <form id="settings_form" action="#" method="post" enctype="multipart/form-data" onsubmit="ss();">
    <label for="basic-url">Basic Event Information </label>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon3">Event Name</span>
        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?=$row['eventname']?>">
    </div>
    <br>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon3">Organizer Name</span>
        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?=$row['organizername']?>">
    </div>
    <br>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon3">Event Password</span>
        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?=$row['password']?>">
    </div>
    <br>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon3">Short Description</span>
        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?=$row['description']?>">
    </div>
    <br>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon3">Event Username</span>
        <input type="text" class="form-control" id="txt_username" name="username" maxlength="12" readonly required aria-describedby="basic-addon3" value="<?=$row['username']?>">
    </div>
    <br>
    <p class="text-muted">You cannot change your event username now. For more information contact Event.FM administrator </p>


    <label for="basic-url">Select an Event Banner</label>
        <p class="text-muted">Select an image to be displayed as the even banner. This image should be at least 1170px wide and 200px tall and should be in JPEG file format</p>
        <input class="btn btn-default" type="file" id="img_cover" name="coverphoto" value="Choose File">
        <br>
        <label for="basic-url">Event.FM whitelist</label>
        <p class="text-muted">Event.FM has a list of YouTube videos which are considered as safe and valid songs that can be played in an public event. If you enable this feature once a user requested one of the songs in the whitelist it will be approved without the acknowledgement of the event administrator(The person who creates the event) </p>
        <div class="checkbox">
            <label><input type="checkbox" name="chk_whitelist" id="chk_whitelist" value="chk_whitelist" <?php if($row['usewhitelist']==1){echo "checked";} ?>> Use Event.FM whitelist</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="chk_explicit" id="chk_explicit" value="chk_explicit" <?php if($row['explicitmetirial']==1){echo "checked";}else{} ?> <?php if($row['usewhitelist']!=1){echo "disabled";} ?>> Allow Explicit Metirial from whitelist</label>
        </div>
        <div class="alert alert-warning" <?php if($row['explicitmetirial']==0){?>style="display: none"<?php }?> id="alert_expl" role="alert"><b>Warning! Explicit Metirials are allowed. </b>This means if a user requested a song/video which contains explicit metirial and its in our whitelist that request willl be approved without the acknowledgement of the event administrator.</div>
        <br>
        <label for="basic-url">Publish Event</label>
        <p class="text-muted">Event.FM has a list of YouTube videos which are considered as safe and valid songs that can be played in an public event. If you enable this feature once a user requested one of the songs in the whitelist it will be approved without the acknowledgement of the event administrator(The person who creates the event) </p>
        <div class="checkbox">
            <label><input type="checkbox" name="chk_publish" id="chk_publish" value="chk_publish" <?php if($row['publishstatus']==1){echo "checked";} ?>> Publish Event Now!</label>
        </div>

    <div style="text-align: right;">
        <button type="submit" class="btn btn-success" id="save_settings">Save Settings</button>
    </div>
    </form>
</div>

<script id="js_ajax">


    $("#chk_whitelist").click(function () {
        if (document.getElementById("chk_whitelist").checked == true){
            document.getElementById("chk_explicit").disabled = false;
        }else {
            document.getElementById("chk_explicit").disabled = true;
            document.getElementById("chk_explicit").checked = false;
            document.getElementById("alert_expl").style.display = "none";

        }

    })

    $("#txt_username").focusout(function () {
        if (!/^(?=^.{3,12}$)^[a-zA-Z][a-zA-Z0-9]*[._]?[a-zA-Z0-9]+$/.test(document.getElementById("txt_username").value)){
            document.getElementById("un_alert_invalid").style.display = "block";
            document.getElementById("un_alert_unavailable").style.display = "none";
            document.getElementById("un_alert_ok").style.display = "none";
            submit_ok = 0;
        }else{
            document.getElementById("un_alert_invalid").style.display = "none";
            document.getElementById("un_alert_unavailable").style.display = "none";
            document.getElementById("un_alert_ok").style.display = "none";
            document.getElementById("div_checkingusername").style.display = "block";
            $.post("requests/checkusername.php",
                {
                    username: document.getElementById("txt_username").value
                },
                function(data, status){
                    document.getElementById("div_checkingusername").style.display = "none";
                    if (data=="1"){
                        document.getElementById("un_alert_invalid").style.display = "none";
                        document.getElementById("un_alert_unavailable").style.display = "none";
                        document.getElementById("un_alert_ok").style.display = "block";
                        submit_ok = 1;
                    }else{
                        document.getElementById("un_alert_invalid").style.display = "none";
                        document.getElementById("un_alert_unavailable").style.display = "block";
                        document.getElementById("un_alert_ok").style.display = "none";
                        submit_ok = 0;
                    }
                });

        }
    })

    function ss() {
        alert("sdsd");
    }

    function checksb() {
        if (submit_ok==0){
            alert("The username you selected is invalid");
            return false;
        }
        return true;
    }
</script>

