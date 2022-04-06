<?php
/*
  Ejemplo estructura basica de xajax (En este caso la funcion esta incluidad en este mismo archivo)
 */

//Lo primero incluimos la libreria xajax que vamos a usar.
require_once './xajax/xajax_core/xajax.inc.php';

//RECUERDA!!! Todo esto puede/deber ir en un archivo php parte y este ser incluido aqui
//
//instanciamos el objeto de la clase xajax 
$xajax = new xajax();

//$xajax->setFlag('debug', true); //Opcional. Configuracion del debug de xajax
//
//Creamos una funcion para llamar por medio de ajax (Hara funciones del lado servidor)
function holaMundo($nombre)
{
    
    //Creo la logica de la funcion (Se puede complicar lo que quieras. Al final tendremos una variable) RECUERDA la variable de salida tiene que ser la variabel final con todo el contenido que deseemos
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

    //RECUERDA!!! Podemos asignar mas de una salida de respuesta 
    //$respuesta->clear("respuesta", "innerHTML"); //Con clear vaciamos el elemento
    $respuesta->assign("respuesta", "innerHTML", $salida); //En el div respuesta pongo el contenido de la variable salida RECUERDA!!! En algunas versiones es addAssign

    return $respuesta;
}

//Asignamos la funcion creada al objeto xajax que creamos al principio
$xajax->registerFunction("holaMundo");//RECUERDA!!! En algunas versiones poner XAJAX_FUNCTION, como primer parametro


//Antes de enviar el contenido a la pagina objeto xajax tiene que procesar cualquier petición 
$xajax->processRequest();
?>

<html> 
    <head> 
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
        <META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=ISO-8859-1"> 
            <title>Xajax Basico</title> 
            <?php
            //En el <head> indicamos al objeto xajax se encargue de generar el javascript necesario RECUERDAD!!! Lo ideal es poner en el head
            $xajax->printJavascript("../xajax"); //IMPORTANTE!!! Parametro ruta donde estan los archivos xajas descomprimidos
            ?> 
    </head> 
    <body> 
        <div id="respuesta">
            Yo soy original
        </div> 
        <script type="text/javascript">
            xajax_holaMundo("carlos"); //Ejecutamos la funcion RECURDAD!! Poner xajax_ antes del nombre de la funcion. La llamo asi por no tenerla asignada en ninguna funcion js
        </script> 
    </body> 
</html>
