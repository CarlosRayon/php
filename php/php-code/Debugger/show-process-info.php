<?php

$memoriaStart = memory_get_peak_usage(true);
$timeStart = microtime(true);

/* Process */

$data = range(1, 10000);

$memoriaEnd = memory_get_peak_usage(true);
$memoriaTotal = $memoriaEnd - $memoriaStart;
$timeEnd = microtime(true);

$info = [
    'time' => bcsub($timeEnd, $timeStart, 4),
    'memory-byte' => $memoriaTotal
];
