<?php
  function generate_random_password($length = 10) {
    $letter = range('A','Z');
    $numbers = range('0','9');
    //$additional_characters = array('_','.');
    $final_array = array_merge($numbers);
         
    $password = '';
  
    while($length--) {
      $key = array_rand($final_array);
      $password .= $final_array[$key];
    }
  
  $lenght2 = 6;
  
  	while($lenght2--)
  	{
  		$key = array_rand($letter);
      $password .= $letter[$key];
  	}
  
    return $password;
  }
  
  
  	
  echo 'Random code generated is "<b>' . generate_random_password(10) . '</b>".';
  
  
  
  
?>