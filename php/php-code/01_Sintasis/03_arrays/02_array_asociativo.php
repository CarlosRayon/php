<?php

/* Array asociativo
 * -Puedo poner de clave tanto Number como String
 * -Si la key no es Number el indice empieza de 0 sin importar la posicion (Mirar resultado para comprender)
 * -Si pongo true||false como indice se considera como indice numerico
 */
$arrayAntiguoAsociativo = array(
    "numero" => 1, "el indice empieza", "String" => "El valor es una cadena", 5, "el anterior" => "sin clave mantenia el orden",
    6 => "mi inidce es un numero", "ahora el indice sigue a partir del indice anterior"
);

$arrayNuevoAsociativo = ["clave 1" => 1, "clave 2" => 2, "clave 3" => 3]; // Accedo al valor por la clave $arrayNuevoAsociativo["clave 1"]; POR POSICION ERROR $arrayNuevoAsociativo[0];
