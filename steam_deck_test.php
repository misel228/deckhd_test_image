<?php

$x = 1920;
$y = 1200;

$image = imagecreate($x, $y);

$red     = imagecolorallocate($image, 255, 0, 0);
$green   = imagecolorallocate($image, 0, 255, 0);
$blue    = imagecolorallocate($image, 0, 0, 255);
$cyan    = imagecolorallocate($image, 0, 255, 255);
$magenta = imagecolorallocate($image, 255, 0, 255);
$yellow  = imagecolorallocate($image, 255, 255, 0);
$light_cyan = imagecolorallocate($image, 91, 206, 250);
$light_magenta = imagecolorallocate($image, 245, 169, 184);
$white   = imagecolorallocate($image, 255, 255, 255);
$black   = imagecolorallocate($image, 0, 0, 0);

$color_order = [
    $red,
    $green,
    $magenta,
    $blue,
    $yellow,
    $cyan,
    $black,
    $light_cyan,
    $light_magenta,
    $white,
    $light_magenta,
    $light_cyan,
    $black,
];


for ($line = 0; $line <= 12; $line += 1) {
    imagefilledrectangle($image, $line, $line, ($x - $line - 1), ($y - $line - 1), $color_order[$line]);
}


imagestring(
    $image,
    5,
    floor($x / 2) - 50,
    floor($y / 2),
    "Deck HD Image Tester by Misel (2023)",
    $white
);

imagestring(
    $image,
    5,
    floor($x / 2),
    floor($y / 2) + 50,
    $x . " x " . $y,
    $magenta
);

header('Content-Type: image/png');

imagepng($image);
