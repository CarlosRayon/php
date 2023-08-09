<?php


/**
 * cleanString Limpia caracteres
 *
 * @param  mixed $str
 * @return void
 */
function cleanString($str, $limit)
{
    return substr(str_replace(["`"], '', preg_replace('([^A-Za-z0-9_-ñÑ ])', ' ', $str)), 0, $limit);
}

/* Lo que queramos sustituir lo ponemos en la REX*/

preg_replace('/[-,. ]/', '', $string);
