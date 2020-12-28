<?php
date("d-m-Y",strtotime( date("d-m-Y") ."- 7 days"));

$strtotime = strtotime('-10 day', time()); //ÚLTIMOS 10 DIAS
$start_timestamp = gmdate("Y-m-d\TH:i:s\Z", $strtotime);
$end_timestamp = gmdate("Y-m-d\TH:i:s\Z");


/* --- OTRA OPCION --- */

$currentDate = new DateTime();

echo "Fecha actual: {$currentDate->format('Y-m-d')}" . PHP_EOL;

$interval = $currentDate->sub(new DateInterval('P2D'))->format('Y-m-d');

echo "Fecha con intervalo menor a un dia: {$interval}";

/* Mas opciones de intervalos en https://www.php.net/manual/es/dateinterval.createfromdatestring.php */