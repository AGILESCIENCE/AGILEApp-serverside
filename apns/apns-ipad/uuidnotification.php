<?php
if(!function_exists("__autoload")){ 
	function __autoload($class_name){
		require_once('classes/class_'.$class_name.'.php');
	}
}


$db = new DbConnect('localhost', 'student1', 'AGILE2013science', 'apns-ipad');
$db->show_errors();


$apns = new APNS($db);


$uuid= $_GET['uuid'];
$message= $_GET['msg'];
$link= $_GET['link'];

 
	
 	




 	//$apns->newMessageByDeviceUId('0DD094B7-26FA-4F27-B144-27F562EE850A');
 	//$apns->newMessageByDeviceUId('FB72BACB-4DFF-4770-9502-8CF4AF4DF840');
   $apns->newMessageByDeviceUId($uuid);
 	$apns->addMessageAlert($message);
 	$apns->addMessageCustom('id',4);
 	$apns->addMessageCustom('link',$link);
 	$apns->addMessageSound('bingbong.aiff');
 	$apns->addMessageBadge(1);
	$apns->queueMessage(); 


	$apns->processQueue();
	
?>