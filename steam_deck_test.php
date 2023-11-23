<?php
$image = imagecreate ( 1600, 1200 );

$red     = imagecolorallocate ( $image, 255,   0,   0 );
$green   = imagecolorallocate ( $image,   0, 255,   0 );
$blue    = imagecolorallocate ( $image,   0,   0, 255 );
$cyan    = imagecolorallocate ( $image,   0, 255, 255 );
$magenta = imagecolorallocate ( $image, 255,   0, 255 );
$yellow  = imagecolorallocate ( $image, 255, 255,   0 );
$light_cyan = imagecolorallocate ( $image,  91, 206, 250 );
$light_magenta = imagecolorallocate ( $image, 245, 169, 184 );
$white   = imagecolorallocate ( $image, 255, 255, 255 );
$black   = imagecolorallocate ( $image,   0,   0,   0 );


imagefilledrectangle( $image,  0,   0, 1919, 1199, $red );
imagefilledrectangle( $image,  1,   1, 1918, 1198, $green );
imagefilledrectangle( $image,  2,   2, 1917, 1197, $magenta );
imagefilledrectangle( $image,  3,   3, 1916, 1196, $blue );
imagefilledrectangle( $image,  4,   4, 1915, 1195, $yellow );
imagefilledrectangle( $image,  5,   5, 1914, 1194, $cyan );
imagefilledrectangle( $image,  6,   6, 1913, 1193, $black );
imagefilledrectangle( $image,  7,   7, 1912, 1192, $light_cyan );
imagefilledrectangle( $image,  8,   8, 1911, 1191, $light_magenta );
imagefilledrectangle( $image,  9,   9, 1910, 1190, $white );
imagefilledrectangle( $image,  10,   10, 1909, 1189, $light_magenta );
imagefilledrectangle( $image,  11,   11, 1908, 1188, $light_cyan );
imagefilledrectangle( $image,  12,   12, 1907, 1187, $black );

imagestring(
    $image,
    5,
    750,
    600,
    "Deck HD Image Tester by Misel (2023)",
    $white
);

header ( 'Content-Type: image/png' );

imagepng ( $image ); 
