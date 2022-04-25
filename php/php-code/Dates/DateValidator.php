<?php
/* For Symfony */
namespace App\Service;

use DateTime;

class DateValidatorService
{

    /**
     * Return true if has correct format
     * @param string $date
     * @param string $format
     * @return bool
     */
    public static function validateDateWithFormat($date, $format = 'Y-m-d')
    {
        $dateFormat = DateTime::createFromFormat($format, $date);
        return $dateFormat && $dateFormat->format($format) === $date;
    }
}
