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
print_r($_POST);





?>

