<?php

// Set the content-type
//header('Content-Type: image/png');
date_default_timezone_set('Europe/Rome');
 

$pathImage = '/var/www/html/AGILEApp/RT/public.jpg';
$pathImage2 = '/var/www/html/AGILEApp/RT/public.jpg';
$pathOrb = '/var/www/html/AGILEApp/RT/public.orb';

// prendo il testo del file con le orbite
$txtOrb    = file_get_contents($pathOrb);

// lo suddivideo per righe
$rows = explode("\n", $txtOrb);

$position = $rows[0];
$time_start = $rows[1];
$time_end = $rows[2];

// prendo l'immagine
$im = imagecreatefromjpeg($pathImage);

// Creo i colori
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);

// Imposto il font
$font = '/var/www/html/apns/expresswayrg.ttf';

	
// Aggiungo i testi
imagettftext($im, 20, 0, 20, 35, $white, $font, $time_start . " - " . $time_end . " UTC");
imagettftext($im, 20, 0, 20, 933, $white, $font,$position);
imagettftext($im, 20, 0, 1160, 933, $white, $font,"(c) AGILE Team");

// sovrascrivo l'immagine
imagejpeg($im,$pathImage2);
imagedestroy($im);

?>