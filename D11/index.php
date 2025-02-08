<?php

include("random.php");

$count = count($data);
$maxvalue = 0;

$maxvalue = max(array_column($data, 'value'));

$maxvalue = ceil($maxvalue / 100);

$width = 1900;
$height = 700;

$image = imagecreatetruecolor($width, $height);

$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);

imagefill($image, 0, 0, $white);
imagefilledrectangle($image, 90, 50, 95, 500, $black);
imagefilledrectangle($image, 90, 500, 1700, 505, $black);

$maxY = 500;
$spaceY = round(460 / ($maxvalue - 1));
$minX = 120;
$dataCount = count($data);
$widthGram = round(1600 / $dataCount - 50);

for($i = 0; $i < $maxvalue; $i++) {
    if ($i === 0) {
        imagestring($image, 10, 50, $maxY, "  " . 0, $black);
    } else {
        imagestring($image, 10, 50, $maxY, $i . "00", $black);
    }

    $maxY -= $spaceY;
}

for($i = 0; $i < $dataCount; $i++)
{
    imagestring($image, 10, $minX + round($widthGram / 5), 520, $data[$i]["name"], $black);

    $random = imagecolorallocate($image, rand(50, 200), rand(50,200), rand(50,200));

    imagerectangle($image, $minX - 1, 498, $minX + $widthGram + 1, $data[$i]["value"] - 1, $black);
    imagefilledrectangle($image, $minX, 497, $minX + $widthGram, $data[$i]["value"], $random);

    $minX += 50 + $widthGram;
}

header("Content-Type: image/png");
imagepng($image);