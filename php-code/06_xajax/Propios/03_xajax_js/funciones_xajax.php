<?php


//instanciamos el objeto de la clase xajax 
$xajax = new xajax();

//$xajax->setFlag('debug', true); //Opcional. Configuracion del debug de xajax

//Creamos una funcion para llamar por medio de ajax (Hara funciones del lado servidor)
function holaMundo($nombre)
{   
    
    //Instanciamos primero las variable que usaremos para evitar errores en al salida
    $salida="";
    //Creo la logica de la funcion (Se puede complicar lo que quieras. Al final tendremos una variable)
    //Codigo php
    $salida = "Hola Mundo " . $nombre;
    
    //Instanciamos el objeto que genera la respuesta
    $respuesta = new xajaxResponse();

    /* Asignamos la respuesta al un elemento del html
      -Parametros
      id del elemento
      Propiedad del elemento que vamos a modificar
      -innertHTML
      -value
      -disable
      Valor que le queremos asignar a la propiedad
     */

    //$respuesta->clear("respuesta", "innerHTML"); //Con clear vaciamos el elemento
    $respuesta->assign("respuesta", "innerHTML", $salida); //En el div respuesta pongo el contenido de la variable salida   
    $respuesta->assign("modulos", "innerHTML", $salida); //En el div respuesta pongo el contenido de la variable salida

    return $respuesta;
}


function funcionDos($parametro)
{
    /*CODIGO PHP*/
    //Variables
    $salida="";
    
    //Codigo php
    if($parametro > 5) {
        $salida="Mas de 5";
    }else{
        $salida="Menos de 5";
    }
    
    
     //Instanciamos el objeto que genera la respuesta
    $respuesta = new xajaxResponse();
    //Asignamos valores al elemento html que queramos
    $respuesta->assign("respuesta", "innerHTML", $salida); //En el div respuesta pongo el contenido de la variable salida 
    //Retornamos la respuesta
    return $respuesta;
}


//Asignamos la funcion creada al objeto xajax que creamos al principio
$xajax->registerFunction("holaMundo");//rRECUERDA!!! Segun version puede llevar XAJAX_FUNCTION como primer parametro
$xajax->registerFunction("funcionDos");

//Antes de enviar el contenido a la pagina objeto xajax tiene que procesar cualquier petición RECUERDA!!!
$xajax->processRequest();

?> 

