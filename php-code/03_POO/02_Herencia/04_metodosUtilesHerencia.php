<?php

/* 
Metodos utiles para la herencia:
 */

//incluyo la clase hija que hereda de la clase padre(?)
require_once './02_ClaseHijo.php';
//instancio un objeto de la clase hija
$hijo = new ClaseHija("valor atributoHijo2", "valor atributoHijo2");


/*get_parent_class
 devuelve el nombre de la clase padre del objeto*/

echo "La clase padre es: " . get_parent_class($hijo);

/*is_subclass_of:
  -Devuelve true si el objeto o la clase del primer parámetro, tiene como clase base
 ala que se indica en el segundo parámetro, o false en caso contrario.
 */

echo is_subclass_of($hijo, "clasePadre"); //devuelve 1 por ser true

/*Puedo pasarle el nombre de la subclase tambien*/
echo is_subclass_of("claseHija", "clasePadre"); //devuelve 1 por ser true
