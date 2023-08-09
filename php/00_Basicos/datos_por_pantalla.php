<?php

/*
  Funciones de salida de datos
 */
$a = "hola";
echo $a . "segunda cadena" . "tercera cadena" . $a;           //Imprime DIFERENTES cadena de texto en cada llamada Admite puntos tambien
print $a . "segunda cadena" . $a;                   //Imprime UNA SOLA cadena de texto en cada llamada. No admite comas pero si puntos(concatenacion)
printf("Aqui ponemos el formato %s", $a);               //Mirar referencias en W3C

print_r($a); //Imprime información legible para humanos sobre una variable (util para ver contenido arrays)

$array=[1,2,3,4,["a"=>"a","b"=>"b","c"=>"c"],];
var_dump($array); //Muestra información sobre una variable array
