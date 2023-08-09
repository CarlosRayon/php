<?php
//incluimos libreria
require_once './xajax/xajax_core/xajax.inc.php';
require_once './funciones_xajax.php';

?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ejemplo de formulario con xajax</title>
        <?php     
         // En el <head> indicamos al objeto xajax se encargue de generar el javascript necesario (carpeta xajax)
        $xajax->printJavascript("./xajax"); //IMPORTANTE!!! incluir esto en el header
        ?>
    </head>
    <body>

        <div id="mensaje">
            
            <form id="formulario">
                Nombre:<input type="text" name="nombre">
                <br>
                Apellidos: <input type="text" name="apellidos">
                <br>
                <input type="button" value="enviar" onclick="xajax_procesar_formulario(xajax.getFormValues('formulario'))"><!--//RECUERDA Con esta funcion cogemos los datos que mandamos en el formulario-->
            </form> 
        </div>
        
        <div id="salidadatos">

        </div>

    </body>
</html>
