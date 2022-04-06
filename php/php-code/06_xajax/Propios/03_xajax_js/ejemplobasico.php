<?php
/*
  Ejemplo estructura basica de xajax (En este caso la funcion esta incluidad en este mismo archivo
 */

//Lo primero incluimos la libreria xajax que vamos a usar.
require_once './xajax/xajax_core/xajax.inc.php';
require_once './funciones_xajax.php';
?>

<html> 
    <head> 
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
        <META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=ISO-8859-1"> 
            <title>Xajax Basico</title> 
            <?php
            //En el <head> indicamos al objeto xajax se encargue de generar el javascript necesario RECUERDAD!!! Lo ideal es poner en el head
            //RECUERDA!!! HASTA QUE NO CREEMOS EL OBJETO $xajax en funciones php nos dara error
            $xajax->printJavascript("../xajax"); //Parametro ruta donde estan los archivos xajas descomprimidos
            ?> 

            <script src="funciones_js.js" type="text/javascript"></script> 
    </head> 

    <body> 
        <div id="respuesta" onclick="inicializadora()">
            Yo soy original           
        </div> 

        <div id="respuesta">

        </div>
        <input type="button" id="boton" value="Boton"></input>
    </body> 
</html>
