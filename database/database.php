<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 2/7/17
 * Time: 5:55 PM
 */
defined("event.fm_optimus") or die("CSI_DB");
$conn = null;
$dbhost = "heysulo.cuuyvrcrfrtk.us-east-1.rds.amazonaws.com";
//$dbhost = "ec2-54-202-222-202.us-west-2.compute.amazonaws.com";
$username = "sulochana";
$password = "7ang0down";
$database = "eventfm";
$conn = mysqli_connect($dbhost,$username,$password,$database);


if(!$conn){
    die("DB_CONNECTION_ERROR");
}