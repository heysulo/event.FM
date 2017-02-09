<?php
define("event.fm_optimus", true);
include_once ("../database/database.php");
include_once ("../path.php");
include_once ("../facebook.php");

function redirect_main($reason){
    $host = $GLOBALS['host'];
    $_SESSION['home_error'] = $reason;
    echo $reason;
    //header('Location: '.$host."home.php");
    die();
}

/*main var init*/
$eventname = "";
$organizer = "";
$password = "";
$description = "";
$username = "";
$chk_whitelist = 0;
$chk_explicit = 0;

print_r($_POST);
print_r($_FILES);

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

//coverphoto
$target_dir = $publicPath."banners/";
$target_file = md5(($_FILES["coverphoto"]["name"]))."_".md5(date('Y-m-d h:i:sa')).".jpg";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
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
}
echo $target_file;

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







?>

