
<?php

function peticion_post()
{
    $url = "https://www.servicioprueba.com/request";

    $conexion = curl_init();

    $envio = "datos que se envian"; // --- Puede ser un xml, un json, etc.

    curl_setopt($conexion, CURLOPT_URL, $url);

    // --- Datos que se van a enviar por POST.
    curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);

    // --- Cabecera incluyendo la longitud de los datos de envio.
    curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($envio)));

    // --- Petición POST.
    curl_setopt($conexion, CURLOPT_POST, 1);

    // --- HTTPGET a false porque no se trata de una petición GET.
    curl_setopt($conexion, CURLOPT_HTTPGET, FALSE);

    // -- HEADER a false.
    curl_setopt($conexion, CURLOPT_HEADER, FALSE);

    // --- Respuesta.
    $respuesta = curl_exec($conexion);

    if ($respuesta === false) {
        header("Status: 301 Moved Permanently");
        header("Location: https://www.error.php/");
        exit;
    }


    curl_close($conexion);
}
