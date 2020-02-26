<?php
date("d-m-Y",strtotime( date("d-m-Y") ."- 7 days"));

$strtotime = strtotime('-10 day', time()); //ÚLTIMOS 10 DIAS
$start_timestamp = gmdate("Y-m-d\TH:i:s\Z", $strtotime);
$end_timestamp = gmdate("Y-m-d\TH:i:s\Z");