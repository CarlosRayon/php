<?php

/*
  Incluimos la clase smarty
 */

require_once './clases/BaseDatos.php';
require_once './clases/Estaticos.php';
require_once './smarty/libs/SmartyBC.class.php';

session_start();

/* instanciamos un objeto de la clase smarty */
$smarty = new Smarty;

/* Cargamos la librerias de smarty */
$smarty->template_dir = './smarty/templates/';
$smarty->compile_dir = './smarty/templates_c/';
$smarty->cache_dir = './smarty/cache/';
$smarty->config_dir = './smarty/config/';

/* capturo el valor del codigo y con el creo la consulta
 */

if (isset($_GET['consultar'])) {

    $_SESSION['codigo'] = $_GET['consultar']; //Variable de sesion que guarda el codigo la usaremos en la modificacion

    if (BaseDatos::esCicloComun($_GET['consultar'])) {//Aplico la funcion para ver si el ciclo es comu 

        $modulo = BaseDatos::verModuloComun($_GET['consultar']);//Guardo el ciclo del modulo comun
        $datosModulo = Estaticos::datosModulo($modulo);//Guardo los datos del odulo comun
        $formularioModificar = Estaticos::formularioModificarModulo($_GET['consultar']);//Guardo el formulario modificar moodulo comun
        
    } else {//Si el modulo no es comun

        $alumnosMatriculados = BaseDatos::alumnosMatriculados($_GET['consultar']);//Guardo los datos del alumno matriculado en el modulo
    }
}

//Si he pulsado el boton actualizar
if (isset($_GET['modificar'])) {
    //Aplico la funcion de actualizar el modulo comun
    
    BaseDatos::actualizarModuloComun($_SESSION['codigo']); //utilizamos la variable de sesion
    
    echo "modificar";
}


//asignamos las variables para la plantilla smarty

if (isset($formularioModificar)) {
    $smarty->assign('formularioModificar', $formularioModificar);
}

if (isset($alumnosMatriculados)) {
    $smarty->assign('alumnosMatriculados', $alumnosMatriculados);
}
if (isset($datosModulo)) {
    $smarty->assign('datosModulo', $datosModulo);
}

/* Rederizamos la plantilla */
$smarty->display('consulta.tpl');
