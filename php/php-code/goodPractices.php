<?php

/* ----- BAD ----- */
function vn($nombre)
{

    if ($nombre == 'tests') {
        // .....
        return 'valido';
    } elseif (count($nombre) < 3) {
        return 'pocas letras';
    } else {
        return 'no valido';
    }
}


 /* ---- Good ---- */

/**
 * Good
 *
 * @param  string $name
 * @return string
 */
function validateName(string $name): string
{
    if (strlen($name) < 3) {
        return 'pocas letras';
    }


    if ('tests' === $name) {

        // ......

        return 'valido';
    }

    return 'no valido';
}
