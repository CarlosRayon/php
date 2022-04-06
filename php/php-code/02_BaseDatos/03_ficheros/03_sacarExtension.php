<?php

/*
Obtener extension un archivo
 * split esta absoleta
 */

$cadena = "NombreArchivo.extension";
$ext = substr(strrchr($cadena, '.'), 1);
$ext = substr($cadena, strrpos($cadena, '.') + 1);

echo $ext;
