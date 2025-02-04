<?php
$rawData = file_get_contents('php://input');

$data = json_decode($rawData);

$h = date('h');
$m = date('i');
$s = date('s');

$time = $h.'-'.$m.'-'.$s;

file_put_contents($time . "-request.txt", $rawData);
