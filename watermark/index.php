<?php

$img = imagecreatefromjpeg("img.jpg");

$white = imagecolorallocate($img, 255, 255 ,255);
$font = "arial.ttf";

imagestring($img, 5,0, 0, "hello", $white);

imagettftext($img, 24, 0,  500, 500, $white, $font, "ASD");

header("Content-type: image/png");
imagejpeg($img);
imagedestroy($img);