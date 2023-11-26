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

## OUTER BORDER
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


for ($line = 0; $line < count($color_order); $line += 1) {
    imagefilledrectangle($image, $line, $line, ($x - $line - 1), ($y - $line - 1), $color_order[$line]);
}

## GRID

$dark_grey   = imagecolorallocate($image, 28, 28, 28);
$grey   = imagecolorallocate($image, 128, 128, 128);

# the first multiple of five after the color bands
$small_grid = 24;
$offset_small = ((floor(count($color_order) / $small_grid) + 1) * $small_grid) - 1;

# vertical 24 pix
for($line_x = $offset_small; $line_x < ($x - $offset_small); $line_x += $small_grid) {
    imageline($image, $line_x, (count($color_order) -1), $line_x, ($y - (count($color_order))), $dark_grey);
}

# horizontal 24 pix
for($line_y = $offset_small; $line_y < ($y - $offset_small); $line_y += $small_grid) {
    imageline($image, (count($color_order) -1), $line_y, ($x - (count($color_order))), $line_y, $dark_grey);
}

# the first multiple of five after the color bands
$large_grid = 240;
$offset_large = ((floor(count($color_order) / $large_grid) + 1) * $large_grid) - 1;

# vertical 24 pix
for($line_x = $offset_large; $line_x < ($x - $offset_large); $line_x += $large_grid) {
    imageline($image, $line_x, (count($color_order) -1), $line_x, ($y - (count($color_order))), $grey);
}

# horizontal 24 pix
for($line_y = $offset_large; $line_y < ($y - $offset_large); $line_y += $large_grid) {
    imageline($image, (count($color_order) -1), $line_y, ($x - (count($color_order))), $line_y, $grey);
}

## TEXT
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
