<?php

function peticion_get()
{

    $url = "https://www.servicioprueba.com/request?param=a&param-2=b";

    $conexion = curl_init();

    // --- Url
    curl_setopt($conexion, CURLOPT_URL, $url);
    // --- Petición GET.
    curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);

    // --- Cabecera HTTP.
    curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    // --- Para recibir respuesta de la conexión.
    curl_setopt($conexion, CURLOPT_RETURNTRANSFER, 1);



    // --- Respuesta
    $respuesta = curl_exec($conexion);



    if ($respuesta === false) {

        header("Status: 301 Moved Permanently");
        header("Location: https://www.error.php/");
        exit;
    }


    curl_close($conexion);
}
