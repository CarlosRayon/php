<?php

/*

 Sirven para capturara errores y cambiar el fluyo del programa
Esquema basico:

try {

    Donde se puede producir la excepcion
    throw new Exception ("Mensaje de la excepcion");
} catch (Exception $exc) {

   Lo que quermos hacer con la excepcion

    echo $exc->getTraceAsString();

} finally {

 Se ejecutara se tenga excepcion si o no
}
*/

/*Ejemplo para lanzar un error e interrumpir el script
$milado=-2;
function areaCuadrado($lado)
{
    if($lado<0){
        throw new Exception("Error que mostrara en pantalla");
    }else{
        return $lado * $lado;
    }
}
areaCuadrado($milado);
 */

/*Ejemplo para capturar una excepcion simple*/

$milado = -2;
function areaCuadrado($lado)
{
    try {
        if ($lado < 0) {
            throw new Exception("Mensaje de la exception que lanzo"); //Creo la excepcion
        }
    } catch (Exception $exc) { //La capturo y mando el mensaje

        echo $exc->getMessage();
    }
}
areaCuadrado($milado);
