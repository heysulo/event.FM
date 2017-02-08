<?php
// File and new size
$newwidth = 0;
$newheight = 0;
$percent = 0;
$filename = 'public/img/MathLab.jpg';
if (isset($_GET['w']) and isset($_GET['h'])){
    $newwidth = $_GET['w'];
    $newheight = $_GET['h'];
}
if (!isset($_GET['f'])){
    die();
}else{
    $filename = htmlspecialchars_decode($_GET['f']);
}





// Content type
header('Content-Type: image/jpeg');

// Get new sizes
list($width, $height) = getimagesize($filename);
$percent = 0;
if ($newheight == 'a'){
    $percent = $newwidth/$width;
    $newheight = $height * $percent;
}elseif ($newwidth == 'a'){
    $percent = $newheight/$height;
    $newwidth = $width * $percent;
}
//$newwidth = $width * $percent;
//$newheight = $height * $percent;

// Load
$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = imagecreatefromjpeg($filename);

//echo $newheight," ",$newwidth," ",$percent;
// Resize
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
//echo $newheight;
// Output
imagejpeg($thumb);
?>