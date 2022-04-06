<?php


//Instanciamos objeto xajax
$xajax = new xajax();

//Creamos la funcion php que procesara el formulario
function procesar_formulario($datos_formulario)
{
    //El parametro recibido sera un array asociativo. Como si le paso un get o un post
    
    /* Procesamos los datos (Se puede complicar lo que queramos) */
    $salida = "Gracias por los datos";
    $salida .= " Su nombre es " . $datos_formulario["nombre"];
    $salida .= " y su apellido es " . $datos_formulario["apellidos"];

    //Instanciamos el objeto para generar la salida xajax
    $respuesta = new xajaxResponse();

    //Ponemos donde queremos y de que forma incluir la salida    
    $respuesta->assign("salidadatos", "innerHTML", $salida);

    return $respuesta;
}

//Registramos la funcion creada para poder usarla
$xajax->registerFunction("procesar_formulario");

//El objeto xajax tiene que procesar cualquier petición
$xajax->processRequest();

