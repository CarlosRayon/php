<?php

$tablaModulos = "<table border='1'>"; //Creo la tabla
$tablaModulos .= "<thead>";
$tablaModulos .= "<tr><th>Contador</th><th>Modulo</th></tr>";
$tablaModulos .= "<thead>";

$tablaModulos .= "<tbody>";

for ($i = 0; $i < count($datos); $i++) {
    $tablaModulos .= "<tr>";
    
    if ($i % 2 == 0) {

        $tablaModulos .= "<td id='pares'>" . $contador . "</td>";
        $tablaModulos .= "<td id='pares'>" . $datos[$i]["modulo"] . "</td>";
        $tablaModulos .= "<td>"
                . '<form id=' . $datos[$i]["modulo"] . ' action="javascript:void(null);" onsubmit="anular(' . $datos[$i]["modulo"] . ');">';
        // Metemos ocultos los datos de los productos
        $tablaModulos .= "<input type='hidden' name='modulo' value='" . $datos[$i]["modulo"] . "'/>";
        $tablaModulos .= "<input type='submit' name='enviar' value='ANULAR'/>";
        $tablaModulos .= "</form>";
        $tablaModulos .= "</td>";
        
    } else {
        $tablaModulos .= "<td id='pares'>" . $contador . "</td>";
        $tablaModulos .= "<td id='pares'>" . $datos[$i]["modulo"] . "</td>";
        $tablaModulos .= "<td>"
                . '<form id=' . $datos[$i]["modulo"] . ' action="javascript:void(null);" onsubmit="anular(' . $datos[$i]["modulo"] . ');">';
        // Metemos ocultos los datos de los productos
        $tablaModulos .= "<input type='hidden' name='modulo' value='" . $datos[$i]["modulo"] . "'/>";
        $tablaModulos .= "<input type='submit' name='enviar' value='ANULAR'/>";
        $tablaModulos .= "</form>";
        $tablaModulos .= "</td>";
    }
}
$tablaModulos .= "</tbody>";
$tablaModulos .= "</table>";

$modulos = $tablaModulos; //a otra variables

    
