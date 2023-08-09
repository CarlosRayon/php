<?php

/*
  Incluimos la clase smarty
 */
require_once './clases/Alumno.php';
require_once './clases/BaseDatos.php';
require_once './smarty/libs/SmartyBC.class.php';

session_start();

/* instanciamos un objeto de la clase smarty */
$smarty = new Smarty;

/* Cargamos la librerias de smarty */
$smarty->template_dir = './smarty/templates/';
$smarty->compile_dir = './smarty/templates_c/';
$smarty->cache_dir = './smarty/cache/';
$smarty->config_dir = './smarty/config/';

//Si he pulsado el boton actualizar
if (isset($_GET['modificar'])) {
    
    //Aplico la funcion de actualizar el modulo comun    
    BaseDatos::actualizarModuloComun($_SESSION['codigo']); //utilizamos la variable de sesion  
    header("location:maestra.php"); //Redirecciona 
}

/* MODIFICADO */
if (isset($_GET['consultar'])) {
    $_SESSION['codigo'] = $_GET['consultar']; //Variable de sesion que guarda el codigo la usaremos en la modificacion
    /* Obtengo el modulo eleguido en maestra.php por su codigo */
    $modulo = BaseDatos::verModuloComun($_GET['consultar']); //Guardo el ciclo del modulo comun
    /* Obtengo el alumno matriculado en el modulo */
    $alumnos = BaseDatos::alumnosMatriculados($_GET['consultar']); //Guardo los datos del alumno matriculado en el modulo
}

$smarty->assign("modulo", $modulo);
$smarty->assign("alumnos", $alumnos);

/* Rederizamos la plantilla */
$smarty->display('consulta.tpl');
