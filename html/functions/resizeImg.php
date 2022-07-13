<?php
require 'functions.php';
// SOURCE DE MON IMG
$imgSource = "../ressources/img-profile/Flackooo.jpeg";
// DESTINATION
$dest = "../ressources/img-resized/".getUserImgById($_SESSION["id"])."";

// ORIGINAL DIMENSIONS
$size = getimagesize($imgSource);
$width = $size[0];
$height = $size[1];

//RESIZE 
$resize = "0.2"; // 50%
$rwidth = ceil($width * $resize);
$rheight = ceil($height * $resize);

// ORIGINAL IMG 
$auth = imagecreatefromjpeg($imgSource);

// RESIZE ORIGIN IMG
//creation d'un objet image vide & copie de l'img source dans la vide;
$resized = imagecreatetruecolor($rwidth, $rheight);
// img de destination & source  (resized & auth);
//Second parametre les coordonnées x-y des img redimensionées et auth
imagecopyresampled(
    $resized,$auth,
    0,0,0,0,
    $rwidth,$rheight,
    $width,$height);
// SAUVEGARDE
imagejpeg($resized,$dest);

imagedestroy($auth);
imagedestroy($resized);