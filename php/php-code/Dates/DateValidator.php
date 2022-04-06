<?php
/* For Symfony */
namespace App\Service;

use DateTime;

class DateValidatorService
{

    public static function validateDateWithFormat($date, $format = 'Y-m-d')
    {
        $dateFormat = DateTime::createFromFormat($format, $date);
        return $dateFormat && $dateFormat->format($format) === $date;
    }
}
