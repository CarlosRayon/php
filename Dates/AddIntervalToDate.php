<?php

/* https://www.php.net/manual/es/class.datetime.php*/
/* https://manuales.guebs.com/php/dateinterval.construct.html*/

$date = new DateTime();

var_dump($date);

$dateWithInterval = $date->add(new DateInterval('P12M'));

var_dump($dateWithInterval);
