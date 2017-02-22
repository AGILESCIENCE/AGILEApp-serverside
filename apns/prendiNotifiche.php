<?php

$devicetoken= $_GET['devicetoken'];

if(!function_exists("__autoload")){ 
 
    function __autoload($class_name){
		require_once('classes/class_'.$class_name.'.php');
	}
}

$db = new DbConnect('localhost', 'student1', 'AGILE2013science', 'apns');
$db->show_errors();
 
$time= time();
$timeStart = $time-2592000;

//data>$timeStart  AND

 



$sql = "SELECT pid FROM apns_devices WHERE  devicetoken='".$devicetoken."'"; //WHERE  data>$timeStart  AND clientid='$id' AND letto='NO' 
	$result = $db->query($sql); 
	
	
while($row = $result->fetch_array(MYSQLI_ASSOC)){
	    $pid=$row['pid'];
          //  print $pid;
	    //print ",";
           // $link=$row['link'];
            //print $link;
	  /*  print ",";
            $letto=$row['letto'];
            print $letto;
            print ",";
            $letto=$row['pid'];
            print $letto;*/
	  //  print "<br>";
        
        
	}
	


$sql = "SELECT * FROM apns_messages WHERE  data>$timeStart AND fk_device='$pid' ORDER BY data DESC "; //WHERE  data>$timeStart  AND clientid='$id' AND letto='NO' 
	$result = $db->query($sql); 
;

while($row = $result->fetch_array(MYSQLI_ASSOC)){
	    $message=$row['messaggio'];
            print $message;
	    print ",";
            $link=$row['link'];
            print $link;
	  /*  print ",";
            $letto=$row['letto'];
            print $letto;
            print ",";
            $letto=$row['pid'];
            print $letto;*/
	    print "<br>";
        
        
	}
	


?>
