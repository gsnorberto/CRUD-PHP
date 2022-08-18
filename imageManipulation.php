<?php

// $imagem = imagecreatetruecolor(300, 300);

// $cor = imagecolorallocate($imagem, 255, 0, 0); //rgb

// imagefill($imagem, 0, 0, $cor); //image, x, y, cor

// //header("Content-Type: image/jpeg");

// imagejpeg($imagem, 'nova_imagem.jpg', 100); //imagem, local para armazenar, qualidade do jpeg

$arquivo = 'paisagem.jpg';
$maxWidth = 200;
$maxHeight = 200;

//$info = getimagesize($arquivo);
list($originalWidth, $originalHeight) = getimagesize($arquivo);

$ratio = $originalWidth / $originalHeight; //image proportion
$ratioDest = $maxWidth / $maxHeight; //image destiny proportion

$finalWidth = 0;
$finalHeight = 0;

//In this example, a image with a ratio of 1920 x 1080 will be converted to a ratio of  200 x 112
if($ratioDest > $ratio) {
    $finalWidth = $maxHeight * $ratio;
    $finalHeight = $maxHeight;
} else {
    $finalHeight = $maxWidth / $ratio;
    $finalWidth = $maxWidth;
}

$imagem = imagecreatetruecolor($finalWidth, $finalHeight);
$originalImg = imagecreatefromjpeg($arquivo);

imagecopyresized(
    $imagem,
    $originalImg,
    0, 0, 0, 0,
    $finalWidth,
    $finalHeight,
    $originalWidth,
    $originalHeight
);

header("Content-Type: image/jpeg");
imagejpeg($imagem, null, 100);