<?php


/* Añadimos con add() https://www.php.net/manual/es/datetime.add.php */
$currentDate = new DateTime();

echo $currentDate->format('Y-m-d') . PHP_EOL;

$newDate = $currentDate->add(new DateInterval('P2D'));

echo $newDate->format('Y-m-d') . PHP_EOL;

/* Añadimos con add() https://www.php.net/manual/es/datetime.add.php */
$currentDate = new DateTime();

echo $currentDate->format('Y-m-d') . PHP_EOL;

$newDate = $currentDate->sub(new DateInterval('P2D'));

echo $newDate->format('Y-m-d');

/* Mas opciones de intervalos en https://www.php.net/manual/es/dateinterval.createfromdatestring.php */

/* Añadir horas */
new DateInterval('PT24H');

/* Añadir minutos */
new DateInterval('PT24M');

/* Dia y horas */
new DateInterval('P4DT24H24M')





/* --- OTRA OPCION --- */
date("d-m-Y", strtotime(date("d-m-Y") . "- 7 days"));
$strtotime = strtotime('-10 day', time()); //ÚLTIMOS 10 DIAS
$start_timestamp = gmdate("Y-m-d\TH:i:s\Z", $strtotime);
$end_timestamp = gmdate("Y-m-d\TH:i:s\Z");
