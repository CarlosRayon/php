<?php


/*Paso basico para poder funcionar con smarty
 * -Incluimos la clase que estara el la carpeta libs de smarty
 * -Instanciamos un objeto de esta clase
 * -Cargamos las librerias
 */
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
