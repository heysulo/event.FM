<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 2/7/17
 * Time: 9:47 PM
 */
session_start();
session_destroy();
header('Location:./index.php');
?>