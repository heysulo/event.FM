<?php
define("event.fm_optimus", true);

include_once ("../database/database.php");
include_once ("../path.php");


function redirect_main($reason){
    $host = $GLOBALS['host'];
    $_SESSION['home_error'] = $reason;
    echo $reason;
    header('Location: '.$host."createevent.php");
    die();
}

if (empty($_POST))
{
    redirect_main("no post request");
}
include_once ("../facebook.php");
if (!isset($_SESSION['facebook_access_token'])) {
    header('Location: '.$host."index.php");
}
/*main var init*/
$eventname = "";
$organizer = "";
$password = "";
$description = "";
$username = "";
$chk_whitelist = 0;
$chk_explicit = 0;
$chk_publish = 0;
$member_id= $userNode->getId();
$date = date('Y-m-d h:i:sa');



//Check and validate event name
if (isset($_POST['event_name'])){
    $eventname = mysqli_real_escape_string($conn,substr( $_POST['event_name'], 0, 32));
    if ($eventname==""){
        redirect_main("<b>Error : Failed to create event.</b> The event name cannot be blank");
    }
}else{
    //no event name in post
    redirect_main("<b>Error : Failed to create event.</b> The event name was not passed to the server");
}

//Check and validate organizer
if (isset($_POST['organizer'])){
    $organizer = mysqli_real_escape_string($conn,substr( $_POST['organizer'], 0, 80));
    if ($organizer==""){
        redirect_main("<b>Error : Failed to create event.</b> The organizer name cannot be blank");
    }
}else{
    //no organizer name in post
    redirect_main("<b>Error : Failed to create event.</b> The organizer name was not passed to the server");
}

//Check and validate password
if (isset($_POST['password'])){
    $password = mysqli_real_escape_string($conn,substr( $_POST['password'], 0, 32));
    if ($password==""){
        redirect_main("<b>Error : Failed to create event.</b> The Password cannot be blank");
    }
}else{
    redirect_main("<b>Error : Failed to create event.</b> The password was not passed to the server");
}

//Check and validate description
if (isset($_POST['description'])){
    $description = mysqli_real_escape_string($conn,substr( $_POST['description'], 0, 240));
    if ($description==""){
        redirect_main("<b>Error : Failed to create event.</b> The event description cannot be blank");
    }
}else{
    redirect_main("<b>Error : Failed to create event.</b> The event description was not passed to the server");
}

//Check and validate username
if (isset($_POST['username'])){
    $username = strtolower(mysqli_real_escape_string($conn,substr( $_POST['username'], 0, 15)));
    if ($username==""){
        redirect_main("<b>Error : Failed to create event.</b> The event description cannot be blank");
    }else{
        if(preg_match("/^(?=^.{3,12}$)^[a-zA-Z][a-zA-Z0-9]*[._]?[a-zA-Z0-9]+$/", $username)) {
            $query = "SELECT COUNT(*) as total FROM event WHERE username=\"$username\"";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);
            if ($row['total'] != 0){
                redirect_main("<b>Error : Failed to create event.</b> The username selected is not available");
            }
        }else{
            redirect_main("<b>Error : Failed to create event.</b> The username selected is not a valid format");
        }

    }
}else{
    redirect_main("<b>Error : Failed to create event.</b> The event description was not passed to the server");
}

//whitelist settings
if (isset($_POST['chk_whitelist'])){
    $chk_whitelist = 1;
    if (isset($_POST['chk_explicit'])){
        $chk_explicit = 1;
    }else{
        $chk_explicit = 0;
    }

}else{
    $chk_whitelist = 0;
}

if (isset($_POST['chk_publish'])){
    $chk_publish = 1;
}else{
    $chk_publish = 0;
}

//coverphoto
if(!isset($_FILES["coverphoto"])) {
    redirect_main("<b>Error : Failed to create event.</b> The event photo was not provided. (0x0006)");
}
$target_dir = "../public/banners/";
$target_file = md5_file($_FILES["coverphoto"]["tmp_name"])."_".md5(date('Y-m-d h:i:sa')).".jpg";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_FILES["coverphoto"])) {
    $check = getimagesize($_FILES["coverphoto"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        redirect_main("<b>Error : Failed to create event.</b> The event photo seems to be invalid. (0x0001)");
        $uploadOk = 0;
    }

    if ($_FILES["coverphoto"]["size"] > 500000) {
        redirect_main("<b>Error : Failed to create event.</b> The event photo cannt be more than 500KB. (0x0002)");
        $uploadOk = 0;
    }

    if($imageFileType != "jpg") {
        redirect_main("<b>Error : Failed to create event.</b> The event photo is not in JPEG format. (0x0003)");
        $uploadOk = 0;
    }
}else{
    redirect_main("<b>Error : Failed to create event.</b> The event photo was not provided. (0x0006)");
}

if ($uploadOk == 0) {
    redirect_main("<b>Error : Failed to create event.</b> The event photo seems to be invalid. (0x0004)");
} else {
    if (move_uploaded_file($_FILES["coverphoto"]["tmp_name"], $target_dir.$target_file)) {
        $uploadOk = 1;
    } else {
        redirect_main("<b>Error : Failed to create event.</b> The event photo uplaod failed. (0x0005)");
        $uploadOk = 2;
    }
}

$sql = "INSERT INTO `event`(`organizerID`, `organizername`, `eventname`, `password`, `description`, `username`, `bannerimage`, `datecreated`, `publishstatus`, `usewhitelist`, `explicitmetirial`)
 VALUES ($member_id,\"$organizer\",\"$eventname\",\"$password\",\"$description\",\"$username\",\"$target_file\",\"$date\",$chk_publish,$chk_whitelist,$chk_explicit)";

if ($conn->query($sql) === TRUE && $uploadOk==1) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head><?php
       include_once("../head.php");
       ?>
        <title>Event.FM</title>
    </head>
    <body class="defaultbackcolor" style="margin-bottom: 40px;">
    <div class="container">
        <div class="container minstylebar_marg"></div>
        <?php include_once("../user_toppane.php");
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
                    <?php
                    if($chk_publish==1){
                        ?>
                        <div class="alert alert-success" role="alert">Your event is <b>published</b> and the public members who have the password can access the Event page.</b></div>
                        <?php
                    }else{
                        ?>
                        <div class="alert alert-warning" id="un_alert_unavailable" role="alert">Your event is <b>UNPUBLISHED</b> and the public members cannot access it. Publish the event page so the public members who have the event password can access it.</b></div>
                        <?php
                    }
                    ?>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> &nbsp; <b>https://eventfm.azurewebsites.net/</b></span>
                        <input type="text" style="background-color: #fff;" readonly class="form-control" placeholder="Enter Event Password" aria-describedby="sizing-addon1" value="<?=$username?>">
                        <span class="input-group-addon" id="basic-addon2" style="cursor: pointer;" data-toggle="tooltip" title="Copy to clipboard!"><span class="glyphicon glyphicon-copy" aria-hidden="true"></span></span>
                    </div>
                    <br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp; <b>Event Password</b></span>
                        <input type="text" style="background-color: #fff;" readonly class="form-control" placeholder="Enter Event Password" aria-describedby="sizing-addon1" value="<?=$password?>">
                        <span class="input-group-addon" id="basic-addon2" style="cursor: pointer;" data-toggle="tooltip" title="Copy to clipboard!"><span class="glyphicon glyphicon-copy" aria-hidden="true"></span></span>
                    </div>
                    <br>
                    <p class="text-muted">Participants are required to enter this password when they access the event for the first time. Therefore you will have to share this password with the participants.</p>
                    <br>
                    <div style="text-align: center">
                        <button type="button" class="btn btn-success btn-lg" style="width: 100%" onclick="location.href = '../eventadministration.php?u=<?=$username?>';">Continue to Event Administration</button>
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
<?php
} else {
    redirect_main("<b>Error : Failed to create event.</b> Inernal Server Error");
}






?>

