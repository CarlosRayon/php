<?php
/*
  Incluimos la clase smarty
 */
require_once './clases/BaseDatos.php';
require_once './clases/Modulo.php';
require_once './clases/Alumno.php';
require_once './clases/Comun.php';
require_once './smarty/libs/SmartyBC.class.php';

/* instanciamos un objeto de la clase smarty */
$smarty = new Smarty;
/* Cargamos la librerias de smarty */
$smarty->template_dir = './smarty/templates/';
$smarty->compile_dir = './smarty/templates_c/'; //RECUERDA!!! Compile direcciona a la carpeta templates_c
$smarty->cache_dir = './smarty/cache/';
$smarty->config_dir = './smarty/config/';


if (isset($_GET["enviar"])) {//Ya he validado los campos por HTML5 y son todos requeridos 
    /* Capturo los datos */
    $cod = $_GET['codigo'];
    $nombre = $_GET['nombre'];
    $horas = $_GET['horas'];
    $curso = $_GET['curso'];
    $plazas = $_GET['plazas'];
    //$codigo = $_GET['codigocomun'];
    $departamento = $_GET['departamento'];
    
    $moduloComun = new Comun($cod, $nombre, $horas, $curso, $plazas, $cod, $departamento);

    /* Inserto parte del objeto en modulo y la otra en comun */
    BaseDatos::insertarModuloComun($moduloComun);
}

/*Guardamos en una variable la tabla con los modulos*/
$modulos =BaseDatos::listaModulos();

//Asignamos las variables para mostrar en plantilla smarty
$smarty->assign('modulos', $modulos); //Asigno la variable con la informacion a una variable de smarty para mostrar en el template


/* Rederizamos la plantilla */
$smarty->display('maestra.tpl');
