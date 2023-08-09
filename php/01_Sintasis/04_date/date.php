<?php

/*
  Objeto Date
 */

date_default_timezone_set('Europe/Madrid'); //defino la franja horaria
//Formas de obtener fechas del objeto date:

$dia = date("d"); //dia en numero
$dia1 = date("D"); //dia en letras(ingles)
$mes = date("m"); //mes en numeros
$mes1 = date("M"); //mes en letras(ingles)
$año = date("y"); //dos digitos años
$año1 = date("Y"); //año actual completo
//Formas de mostrar las fechas:
echo "hoy es " . $dia . " del " . $mes . " del año " . $año . "<br>";
echo "hoy es " . $dia1 . " del " . $mes1 . " del año " . $año1 . "<br>";
echo "hoy es " . $dia . " del " . $mes . " del año " . $año . "<br>";

echo "<p>Fecha en formato mes/dia/año:  " . date('m/d/y') . "</p>";
echo "<p>Fecha en formato dia/mes/año:  " . date('d/m/y') . "</p>";

//Para mostrar la hora actual
echo "<p>La hora actual es: " . date('G:i:s') . "</p>";

//Funcion para mostrar una fecha
function fecha()
{
    $a = "Dia " . date("d") . " del " . date("m") . " del año " . date("y");
    return $a;
}

echo "<p>Fecha mostrada usando una funcion:  " . fecha() . "</p>";
