<?php
function peticion_patch()
{

    $url = "https://www.servicioprueba.com/request";

    $conexion = curl_init();

    curl_setopt($conexion, CURLOPT_URL, $url);

    // --- Cabecera
    curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    // --- Petición DELETE.
    curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, "DELETE");

    // --- HTTPGET a false porque no se trata de una petición GET.
    curl_setopt($conexion, CURLOPT_HTTPGET, FALSE);

    // --- Respuesta.   
    $respuesta = curl_exec($conexion);

    if ($respuesta === false) {
        header("Status: 301 Moved Permanently");
        header("Location: https://www.error.php/");
        exit;
    }

    curl_close($conexion);
}
