<?php
echo "<br>Ejercicio5 funcion cuadrado referenciado</br>"; 


function calculos(&$a,$b)
{
    $a=pow($a, 2);
    $b=pow($b, 3);
    echo "El cuadrado de A dentro de la funcion es: ",$a, "<br>";
    echo "El cubo de B dentro de la funcion es: ",$b, "<br><br>";
}

$a=3; $b=2;

calculos($a, $b);

echo "Al salir de la funcion A conserva la modificacion: ",$a, "<br>";
echo "Por el contrario, B no la conserva: ",$b, "<br><br>";

?>
