<?php

$numbers = range(1, 40);

if (isset($_GET['factor'])) {
    $factor = (int)$_GET['factor'];

    $numbers = array_map(function ($number) use ($factor) {
        if ($number % $factor === 0) {
            return $number . " is a multiple of 4**";
        } else {
            return $number;
        }
    }, $numbers);
}


echo "<pre>";
print_r($numbers);
echo "</pre>";

?>