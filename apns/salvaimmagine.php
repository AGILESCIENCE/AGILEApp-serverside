<?php

date_default_timezone_set('Europe/Rome');
 
 
// get datetime from both file

$orb_old = '/var/www/html/apns/immagininow/public.orb';
$orb_new = '/var/www/html/AGILEApp/RT/public.orb';



$txt_old    = file_get_contents($orb_old);
$txt_new    = file_get_contents($orb_new);

// get the last datetime
$rows_old = explode("\n", $txt_old);
$time_old = $rows_old[2];
//echo $rows_old[2] . "<br>";


$rows_new = explode("\n", $txt_new);
$position = $rows_new[0];
$time_new_end = $rows_new[2];
$time_new_start = $rows_new[1];
//echo $time_new_start . "<br>" . $time_new_end . "<br>"; 

$timestamp_old =  strtotime($time_old);
$timestamp_new_end =  strtotime($time_new_end);
$timestamp_new_start =  strtotime($time_new_start);

//echo $timestamp_new_end ;

if($timestamp_new_end > $timestamp_old)
{
	//echo "maggiore";
	
	copy($orb_new,$orb_old);
	
	$date; 
	$date2;


   $start = '/var/www/html/AGILEApp/RT/public.jpg';

/*
    $date = date('Y-m-d_H:i:s', $timestamp_new);
    $date_end = date('d/m/Y-H:i:s', $timestamp_new); 
    $date_start = date('d/m/Y-H:i:s', $timestamp_new_start); 
*/

   $end = '/var/www/html/apns/backupimmagini/'.$time_new_end.'.jpg';
 

	copy($start, $end);
	$im = imagecreatefromjpeg($end);

	// Create some colors 
	$white = imagecolorallocate($im, 255, 255, 255);
	$grey = imagecolorallocate($im, 128, 128, 128);
	$black = imagecolorallocate($im, 0, 0, 0);
	//imagefilledrectangle($im, 0, 0, 399, 29, $white);

	// The text to draw
	
	// Replace path by your own font path
	$font = '/var/www/html/apns/expresswayrg.ttf';

	// Add some shadow to the text
	//imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);

	// Add the text
	imagettftext($im, 20, 0, 20, 35, $white, $font, $time_new_start . " - " . $time_new_end . " UTC");
	imagettftext($im, 20, 0, 20, 933, $white, $font,$position);
	imagettftext($im, 20, 0, 1160, 933, $white, $font,"(c) AGILE Team");

	// Using imagepng() results in clearer text compared with imagejpeg()
	imagejpeg($im,$end);
	imagedestroy($im);






	$end2 = '/var/www/html/apns/immagininow/'.$time_new_end.'.jpg';
 

	copy($start, $end2);
	
	$im = imagecreatefromjpeg($end2);

	// Create some colors
	$white = imagecolorallocate($im, 255, 255, 255);
	$grey = imagecolorallocate($im, 128, 128, 128);
	$black = imagecolorallocate($im, 0, 0, 0);
	//imagefilledrectangle($im, 0, 0, 399, 29, $white);

	// The text to draw
	
	// Replace path by your own font path
	$font = '/var/www/html/apns/expresswayrg.ttf';

	// Add some shadow to the text
	//imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);

	// Add the text
	imagettftext($im, 20, 0, 20, 35, $white, $font, $time_new_start . " - " . $time_new_end . " UTC");
	imagettftext($im, 20, 0, 20, 933, $white, $font,$position);
	imagettftext($im, 20, 0, 1160, 933, $white, $font,"(c) AGILE Team");

	// Using imagepng() results in clearer text compared with imagejpeg()
	imagejpeg($im,$end2);
	imagedestroy($im);
	

}
else
{
	;
//	echo "minore";
}
  





 
?>
