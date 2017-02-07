<?php
defined("event.fm_optimus") or die("CSI_PATH");
$publicPath = "http://".$_SERVER['HTTP_HOST']."/public/";
$host = "http://".$_SERVER['HTTP_HOST'];

if ($_SERVER['HTTP_HOST'] == 'localhost'){
    $publicPath = "http://".$_SERVER['HTTP_HOST']."/event.FM/public/";
    $host = "http://".$_SERVER['HTTP_HOST']."/event.FM/";
}


?>