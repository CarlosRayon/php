<?php

function getAddressData($appointmentAddress)
{
    $addressData = [];
    $rexCP = '/\s[0-9]{5}\s/';

    /* get cp */
    preg_match($rexCP, $appointmentAddress, $cp);
    $addressData['cp'] = trim($cp[0]);

    $cpPosition = strpos($appointmentAddress, $addressData['cp']);

    /* get address */
    $addressData['address'] = trim(substr($appointmentAddress, 0, $cpPosition));

    $locationCompleted = trim(substr($appointmentAddress, ($cpPosition + 5)));
    $firstParenthesisPosition = strpos($locationCompleted, "(");

    /* get location */
    $addressData['location'] = trim(substr($locationCompleted, 0, $firstParenthesisPosition));

    /* get province and clean Parenthesis */
    $addressData['province'] = trim(substr($locationCompleted, $firstParenthesisPosition));
    $addressData['province'] = preg_replace("/[\(\)]/", "", $addressData['province']);

    return $addressData;
}


$appointmentAddress = "Kalea Olabidea 3 Pol Ind Rotaberri. 20800 Zarautz (Guipúzcoa)";
$appointmentAddress = "Apartado de Correos, 260. 48960 Galdakao (Bizkaia)";
//$appointmentAddress = "C/ Claudio Coello, 125, 4º Izq. 28006 Madrid (Madrid)";
//$appointmentAddress = "Kalea Olabidea 3 Pol Ind Rotaberri. 20800 (Guipúzcoa)";
//$appointmentAddress = "Apartado de Correos, 260. 48960 (Bizkaia)";
//$appointmentAddress = "C/ Claudio Coello, 125, 4º Izq. 28006 (Madrid)";

print_r(getAddressData($appointmentAddress));
