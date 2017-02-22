<?php

if(!function_exists("__autoload")){ 
	function __autoload($class_name){
		require_once('classes/class_'.$class_name.'.php');
	}
}
$db = new DbConnect('localhost', 'student1', 'AGILE2013science', 'test');
$db->show_errors();


$clientid= $_GET['clientid'];

$sql = "DELETE  FROM apns_devices  WHERE clientid=$clientid ";
	$result = $db->query($sql);


print "operazione riuscita";




?>