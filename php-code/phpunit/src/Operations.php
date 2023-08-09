<?php

declare(strict_types=1);

namespace Src\Ope;

class Operations
{
    public function factorial($number)
    {
        $result = 1;
        for ($i = $number; $i > 1; $i--) {
            $result *= $i;
        }
        return $result;
    }
}
