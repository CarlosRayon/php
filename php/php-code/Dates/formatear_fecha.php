<?php

$time = '2020-11-04 12:24:35';
echo date("H:m:s d-m-Y", strtotime($time));


/* ---------------------  COMPLETE OPTION --------------- */
/* https://desarrolloweb.com/articulos/crear-convertir-fechas-php.html*/

$date = "14/06/2021";
$formatRequired = 'Y-m-d 00:00:00';

try {
    echo filterDates($date, $formatRequired);
} catch (Exception $ex) {
    var_dump($ex);
    throw $ex;
}

function validateDateWithFormat($date, $formatRequired = 'Y-m-d')
{
    $dateFormat = DateTime::createFromFormat($formatRequired, $date);
    return $dateFormat && $dateFormat->format($formatRequired) === $date;
}

function filterDates(string $date, string $formatRequired): string
{

    if (!validateDateWithFormat($date, $formatRequired)) {

        $inputFormat = false;
        if (preg_match('/^([0-2][0-9]|3[0-1])(-)(0[1-9]|1[0-2])\2(\d{4})$/', $date)) {
            $inputFormat = 'd-m-Y';
        }
        if (preg_match('/^([0-2][0-9]|3[0-1])(\/)(0[1-9]|1[0-2])\2(\d{4})$/', $date)) {
            $inputFormat = 'd/m/Y';
        }

        if (!$inputFormat) {
            throw new Exception('Ningún formato valido');
        }

        $object_DateTime = DateTime::createFromFormat($inputFormat, $date);
        $date = $object_DateTime->format($formatRequired);
    }

    return $date;
}
