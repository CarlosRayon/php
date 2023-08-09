<?php
//incluímos la clase ajax
require './xajax/xajax_core/xajax.inc.php';
require_once './funciones_xajax.php';
?>

<html>
    <head>

        <title>Enviar y procesar un formulario con Ajax y PHP</title>
        <?php
        //En el <head> indicamos al objeto xajax se encargue de generar el javascript necesario
        $xajax->printJavascript("./xajax");
        ?>
    </head>

    <body>
        <h1>Recibir y procesar formulario con Ajax y PHP</h1>
        <div id="mensaje">
            Rellena los datos de este formulario y pulsa "Enviar"
        </div>
        <br />

        <div id="capaformulario">

            <form id="formulario">
                Nombre: <input type="text" name="nombre" /><span id="nombre"></span>
                <br />
                Apellidos: <input type="text" name="apellidos" />
                <br />
                <input type="checkbox" name="acepto" value="1" /> Acepto los términos y condiciones ;)
                <br />
                <input type="button" value="Enviar" onclick="xajax_procesar_formulario(xajax.getFormValues('formulario'))" /><!--RECUERDA!!! Paso los datos del formulario a la funcion asi-->
            </form>
        </div>

    </body>
</html>
