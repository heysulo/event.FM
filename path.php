<?php

$publicPath = "http://".$_SERVER['HTTP_HOST']."/public/";

if ($_SERVER['HTTP_HOST'] == 'localhost'){
    $publicPath = "http://".$_SERVER['HTTP_HOST']."/event.FM/public/";
}


?>