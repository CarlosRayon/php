<?php

/* 
Funciones utiles para la interface
 */

require './02_implemetarInterface.php';

/*get_declared_interfaces
 * Devuelve un array con los nombres de los interfaces declarados.*/

print_r(get_declared_interfaces());

/* interface_exists("nombreclaseInterface")
 * vuelve true si existe el interface que se indica, o false en caso contrario.
 */

echo interface_exists("Interfaz"); // devuelve 1 por ser true
