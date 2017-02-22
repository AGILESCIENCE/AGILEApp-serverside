<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('Europe/Rome');
 

$orb = '/ANALYSIS3/app/public.orb';
$txt    = file_get_contents($orb);

// get the datetime
$rows = explode("\n", $txt);
$time = $rows[2];

$end = '/ANALYSIS3/app/gallery/'.$time.'.jpg';
	
copy("/ANALYSIS3/app/public.jpg", $end);


/* // delete images older than 3 months
$files = glob("/ANALYSIS3/app/gallery/"."*.jpg");
$now   = time();

foreach ($files as $file)
	if (is_file($file))
  		if ($now - filemtime($file) >= (60 * 60 * 24 * 30 * 3) ) 
        	unlink($file);
			//echo $file;
*/

/*
// get datetime from both file

$orb_old = '/ANALYSIS3/app/gallery/public.orb';
$orb_new = '/ANALYSIS3/app/public.orb';

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

if($timestamp_new_end > $timestamp_old) // update image
{
	//echo "maggiore";
	
	copy($orb_new,$orb_old);
	
	$date; 
	$date2;
 
    $start = '/ANALYSIS3/app/public.png';
	


    	//$date = date('Y-m-d_H:i:s', $timestamp_new);
    	//$date_end = date('d/m/Y-H:i:s', $timestamp_new); 
    	//$date_start = date('d/m/Y-H:i:s', $timestamp_new_start); 
	
	
    $end = '/ANALYSIS3/app/gallery/'.$time_new_end.'.jpg';
	
	copy($start, $end);
	$im = imagecreatefrompng($end);
	
	// Create some colors 
	$white = imagecolorallocate($im, 255, 255, 255);
	$grey = imagecolorallocate($im, 128, 128, 128);
	$black = imagecolorallocate($im, 0, 0, 0);
	//imagefilledrectangle($im, 0, 0, 399, 29, $white);
	
	// The text to draw
		
	// Replace path by your own font path
	$font = '/ANALYSIS3/app/expresswayrg.ttf';

	// Add some shadow to the text
	//imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);

	// Add the text
	imagettftext($im, 20, 0, 20, 35, $white, $font, $time_new_start . " - " . $time_new_end . " UTC");
	imagettftext($im, 20, 0, 20, 933, $white, $font,$position);
	imagettftext($im, 20, 0, 1160, 933, $white, $font,"(c) AGILE Team");

	// Using imagepng() results in clearer text compared with imagejpeg()
	imagejpeg($im,$end);
	imagedestroy($im);

	// cancellare immagini più vecchie di 3 mesi

}
else
{
	;
//	echo "minore";
}
 */ 





 
?>
