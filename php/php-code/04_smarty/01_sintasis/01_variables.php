<?php
require './00_primerSmarty.php';

/*Creo dos variables normales de php*/
$variable = "<p>soy una variable creada en php</p>";
$variable2 = "<p>yo tambien soy una variable creada en php</p>";

/*asigno a las "varibles" del template las variables del PHP
RECUERDA!!! Usar el mismo nombre para identificar mejor
 */
$smarty->assign("variable", $variable); //la usame en el template {$variable}
$smarty->assign("variable2", $variable2); //la usame en el template {$variable2}

/*Podemos asignar el valor a las variables directament*/
$smarty->assign("varDirecta", "valor asignado directamente");

/*mostramos la plantilla*/

$smarty->display("01_variablesSmarty.tpl");

/*En el template tambien puedo crear carpetas para organizar.
 * pero a la hora de llamarlas con display hay que indicarlo
 * $smarty->display("carpeta/01_variablesSmarty.tpl");
 */
