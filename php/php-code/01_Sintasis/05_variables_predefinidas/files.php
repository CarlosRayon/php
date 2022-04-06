<?php

/*
    Array global $_FILES
        -Contiene la información de los ficheros subidos
 */

$_FILES["fichero_subido"]["name"]; //Nos da el nombre del fichero subido
$_FILES["fichero_subido"]["type"]; //Nos da el tipo del fichero subido
$_FILES["fichero_subido"]["size"]; //Nos da el tamaño del fichero subido
$_FILES["fichero_subido"]["tmp_name"]; //Nos da el nombre temporal del fichero subido
$_FILES["fichero_subido"]["error"]; //Nos da el código de error asociado a esta subida
