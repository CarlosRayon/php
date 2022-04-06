<?php

$tablaModulos = "<table border='1'>"; //Creo la tabla
$tablaModulos .= "<thead>";
$tablaModulos .= "<tr><th>Contador</th><th>Modulo</th></tr>";
$tablaModulos .= "<thead>";

$tablaModulos .= "<tbody>";

for ($i = 0; $i < count($datos); $i++) {
    $tablaModulos .= "<tr>";
    if ($i % 2 == 0) {

        $tablaModulos .= "<td id='impares' >" . $contador . "</td>";
        $tablaModulos .= "<td id='impares'>" . $datos[$i]["modulo"] . "</td>";
        $tablaModulos .= "<td><input type=\"button\" id=\"" . $datos[$i]["modulo"] . "\" name=\"dato\" value=\"Anular\" onclick=\"anular()\"></td>";
    } else {

        $tablaModulos .= "<td id='pares'>" . $contador . "</td>";
        $tablaModulos .= "<td id='pares'>" . $datos[$i]["modulo"] . "</td>";
        $tablaModulos .= "<td><input type=\"button\" id=\"" . $datos[$i]["modulo"] . "\" name=\"dato\" value=\"Anular\" onclick=\"anular()\"></td>";
    }
    $tablaModulos .= "</tr>";
}

$tablaModulos .= "</tbody>";
$tablaModulos .= "</table>";

$modulos = $tablaModulos; //a otra variables

        