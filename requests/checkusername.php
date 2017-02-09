<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 2/8/17
 * Time: 10:45 PM
 */
define("event.fm_optimus", true);
include_once ("../database/database.php");
$username = mysqli_real_escape_string($conn,$_POST['username']);
$query = "SELECT COUNT(*) as total FROM event WHERE username=\"$username\"";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
if ($row['total'] == 0){
    echo "1";
}else{
    echo "0";
}