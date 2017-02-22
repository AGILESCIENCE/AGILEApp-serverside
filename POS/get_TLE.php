<?php


/*
$str = file_get_contents("http://www.n2yo.com/satellite/?s=31135");

$dom= new DOMDocument(); 
$dom->preserveWhiteSpace = false;
$dom->formatOutput       = true;
$dom->loadHTML($str); 

$elements = $dom->getElementsByTagName("center");
foreach ($elements as $element) {
    echo $element->nodeValue, PHP_EOL;
}
*/
header("Content-Type: text/plain");
//$str = "<b>sdfsdf</b><pre>sd d3 \n 43 fsdf</pre>";
$str = file_get_contents("http://www.n2yo.com/satellite/?s=31135");
//echo $str;
//$regex = '#<pre>(.*)</pre>#i';
//"{<pre[^>]*>(.*?)</pre>}" funzionante
$regex ="/<pre>(.*?)<\/pre>/s";
preg_match_all($regex,
                   $str,
                   $matches,
                   PREG_PATTERN_ORDER);
$TLE = explode("\n",$matches[1][0]);
/*
	Array
(
    [0] => 
    [1] => 1 31135U 07013A   16273.28205423  .00005243  00000-0  14305-3 0  9999
    [2] => 2 31135   2.4683 339.1141 0013721 261.4209  98.4290 15.28646681523704
    [3] => 
)

*/
$line1 = str_replace(array("\n","\r"),"",$TLE[1]);
$line2 = str_replace(array("\n","\r"),"",$TLE[2]);


$fileh = fopen("/var/www/html/AGILEApp/POS/TLE.json", "w") or die("Unable to open file!");
//chmod("TLE.json", 0766);
$txt = '{"TLE":["'.$line1.'","'.$line2.'"]}';

fwrite($fileh,$txt);
fclose($fileh);



?>
