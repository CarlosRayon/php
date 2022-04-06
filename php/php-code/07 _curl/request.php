<?php

/**
 * requestGet
 *
 * @param  string $url
 * @return something
 */
function requestGET($url)
{

    /* Example */

    // "https://www.servicioprueba.com/request?param=a&param-2=b";
    // "https://auraseguros.aibecloud.com/insertleadaura.aspx?idcampaign=LEADS_MADZ&id=555777999&nameuser=$name%20$lastName&email=&numberPhone=$phone&info=" . urlencode('Seguro de decesos:NO\nCia:\nOrigen: emailmarketing'

    $connect = curl_init();

    /* --- Url */
    curl_setopt($connect, CURLOPT_URL, $url);

    /* --- request GET. */
    curl_setopt($connect, CURLOPT_HTTPGET, true);

    /* --- header HTTP. */
    curl_setopt($connect, CURLOPT_HTTPHEADER, array('Content-Type: text/html; charset=utf-8'));


    /* --- To receive response from the connection. */
    curl_setopt($connect, CURLOPT_RETURNTRANSFER, 1);

    /* --- response */
    $response = curl_exec($connect);

    if ($response === false) {
        header("Status: 301 Moved Permanently");
        header("Location: https://www.error.php/");
        exit;
    }

    curl_close($connect);
    return $response;
}



/**
 * requestPost
 *
 * @param  string $url
 * @param  mixed  $data
 * @return something
 */
function requestPOST($url, $data)
{

    /* Example data */
    // $data = array(
    //     "phone" => $data['tel'],
    //     "nombre" => $data['nombre'] . ' ' . $data['apellido'],
    //     "email" => $data['email'],
    //     "address_id" => "direccion",
    //     "cups" => "",
    //     "provincia" => "provincia",
    //     "poblacion" => "poblacion",
    //     "idlead" => "no",
    //     "optin" => "no",
    //     "origen" => "Madz",
    //     "campania" => "ADCLICK-AURA-LPS",
    //     "lead_tipo" => "LPS"
    // );

    $connect = curl_init();

    curl_setopt($connect, CURLOPT_URL, $url);

    /* --- Data to be sent by POST */
    curl_setopt($connect, CURLOPT_POSTFIELDS, json_encode($data));  /* --- xml, un json, etc. */

    /* --- Header including the length of the shipping data. */
    curl_setopt($connect, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data)));
    // curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    /* --- request POST. */
    curl_setopt($connect, CURLOPT_POST, 1);

    /* --- HTTPGET to false because it is not a GET request. */
    curl_setopt($connect, CURLOPT_HTTPGET, false);

    /* -- HEADER a false.*/
    curl_setopt($connect, CURLOPT_HEADER, false);

    /* --- response.*/
    $response = curl_exec($connect);

    if ($response === false) {
        header("Status: 301 Moved Permanently");
        header("Location: https://www.error.php/");
        exit;
    }

    curl_close($connect);

    return $response;
}

/**
 * requestPATCH
 *
 * @param  mixed $url
 * @return void
 */
function requestPATCH($url)
{

    $connect = curl_init();

    curl_setopt($connect, CURLOPT_URL, $url);

    /* --- Headers */
    curl_setopt($connect, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    /* --- request DELETE. */
    curl_setopt($connect, CURLOPT_CUSTOMREQUEST, "DELETE");

    /* --- HTTPGET to false because it is not a GET request. */
    curl_setopt($connect, CURLOPT_HTTPGET, false);

    /* --- response. */
    $response = curl_exec($connect);

    if ($response === false) {
        header("Status: 301 Moved Permanently");
        header("Location: https://www.error.php/");
        exit;
    }

    curl_close($connect);

    return $response;
}



/**
 * requestPUT
 *
 * @param  string $url
 * @param  mixed  $data
 * @return void
 */
function requestPUT($url, $data)
{

    $connect = curl_init();

    curl_setopt($connect, CURLOPT_URL, $url);

    /* --- Datos que se van a enviar por PUT. */
    curl_setopt($connect, CURLOPT_POSTFIELDS, $data);

    /* --- Header including the length of the shipping data. */
    curl_setopt($connect, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data)));

    /* --- request PUT. */
    curl_setopt($connect, CURLOPT_CUSTOMREQUEST, "PUT");

    /* --- HTTPGET to false because it is not a GET request. */
    curl_setopt($connect, CURLOPT_HTTPGET, false);


    /* --- response. */
    $response = curl_exec($connect);

    if ($response === false) {
        header("Status: 301 Moved Permanently");
        header("Location: https://www.error.php/");
        exit;
    }

    curl_close($connect);
    return $response;
}
