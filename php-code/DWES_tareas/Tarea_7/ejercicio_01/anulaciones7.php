<?php
require_once './include/xajax/xajax_core/xajax.inc.php';
require_once './include/BD.php';
require_once './include/pFunciones.php';

/* Como prueba la funcion anular funciona correctamente pero usando la xajax y pasando parametros por
 * la funcion xajax  no se ejecuta la sentencia sql y no se por que :(  porque ademas los parametros estan bien pasados como
 * podemos ver
 */
/*
$d= BaseDatos::anular("ASO",2);
echo $d;
*/

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Anulaciones de modulos</title>
        <link href="style/css.css" rel="stylesheet" type="text/css"/>

        <?php
        //En el <head> indicamos al objeto xajax se encargue de generar el javascript necesario 
        $xajax->printJavascript("./include/xajax"); //Parametro ruta donde estan los archivos xajas descomprimidos
        ?> 

        <script src="include/xFunciones.js"></script>
    </head>

    <body>


        <div id="contenedor">

            <label for="numeromatricula">Nº de Matricula</label>
            <input type="text" id="numeromatricula" name="numeromatricula">

            <span id="datosalumno"></span>

            <form id="formulario">
                <fieldset>
                    <legend>Relacion de modulos</legend>
                    <div id="modulos">
                             
                    </div>
                    <div id="mensajes">
                             
                    </div>
                    
                </fieldset>    
                
            </form>

        </div>
    </body>
</html>
