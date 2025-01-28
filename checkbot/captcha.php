<?php
$characterDictionary = '0123456789abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$targetLayer = imagecreatetruecolor(120, 40);
$fontSize = 30;
$captchaBackground = imagecolorallocate($targetLayer, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));

imagefill($targetLayer, 0, 0, $captchaBackground);

for ($i = 0; $i < 4; $i++) {
    $lineColor = imagecolorallocate($targetLayer, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    imageline($targetLayer, 0, rand() % 50, 200, rand() % 50, $lineColor);
}

for ($i = 0; $i < 200; $i++) {
    $pixelColor = imagecolorallocate($targetLayer, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    imagesetpixel($targetLayer, rand() % 200, rand() % 50, $pixelColor);
}

for ($i = 1; $i < 5; $i++) {
    $captchaCode = substr(str_shuffle($characterDictionary), 0, 1);
    $captchaTextColor = imagecolorallocate($targetLayer, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    imagettftext($targetLayer, $fontSize, mt_rand(-10, 10), 20 * $i, 35, $captchaTextColor,
        'cyberfall-2.ttf', $captchaCode);
}

imagejpeg($targetLayer);
header('Content-type: image/jpeg');

?>