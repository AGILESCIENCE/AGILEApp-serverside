<?php



 //read the entire string
 $str=file_get_contents('/var/www/html/apns/immagininow/public.orb');
 echo $str;
 //replace something in the file string - this is a VERY simple example
 $str=str_replace("2015-03-28T11:57:07", "2015-03-28T11:57:00",$str);
 
 
 //write the entire string
 file_put_contents('/var/www/html/apns/immagininow/public.orb', $str);
 
 echo $str;

?>
