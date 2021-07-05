<?php
//conversion en milli//

$timeString = $;
$dateTime   = DateTime::createFromFormat('H:i:s,u', $timeString);
 
$milliseconds =
    $dateTime->format('H') * 3600000 +
    $dateTime->format('i') * 60000 +
    $dateTime->format('s') * 1000 +
    $dateTime->format('u') / 1000;
 
echo $milliseconds;

//conversion en min-sec
$input = $milliseconds;

$milliseconds= $input % 1000;
$input = floor($input / 1000);

$seconds = $input % 60;
$input = floor($input / 60);

$minutes = $input % 60;
$input = floor($input / 60); 

echo"<br>". $minutes." minute(s) ".$seconds." secondes ".$milliseconds." millièmes"."<br>";