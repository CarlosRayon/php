<?php

/*incluimos la clase Smarty*/
require_once '../smarty/libs/Smarty.class.php';

/*instanciamos un objeto de la clase smarty*/
$smarty = new Smarty();

/*cargamos la librerias de smarty*/
/*RECUERDA!!! Evitamos errores viendo las rutas de las librerias con include asi evitamos errores
     - include '../smarty/config/'; //Luego lo borramos y listo
*/

$smarty->template_dir = '../smarty/templates/';
$smarty->compile_dir = '../smarty/templates_c/'; //RECUERDA!!! Compile direcciona a la carpeta templates_c
$smarty->cache_dir = '../smarty/cache/';
$smarty->config_dir = '../smarty/config/';

/*Creamos variables en php*/
$variableNumero = 2;
$variableString = "No es mayor de 3";

/*Las asignamos a la plantilla smarty*/
$smarty->assign("variableNumero", $variableNumero);
$smarty->assign("variableString", $variableString);

/*Mostramos la plantilla smarty*/

$smarty->display("01_if.tpl");
