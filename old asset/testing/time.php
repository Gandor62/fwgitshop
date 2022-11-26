<?php

$dat = date("d-m-Y_h-i") ;

echo $dat;

$date = new DateTime();
$timeZone = $date->getTimezone();
echo $timeZone->getName();

?>