<?php
//Este codigo php deberia ir en arhcivo aparte  ser incluido aqui
//incluimos la clase ajax
require './xajax/xajax_core/xajax.inc.php';

//instanciamos el objeto de la clase xajax
$xajax = new xajax();

//$xajax->setFlag('debug', true);


function procesar_formulario($form_entrada)
{
    //Hacemos codigo php
    $salida = "Gracias por enviarnos tus datos. Hemos procesado esto:<p>";
    $salida .= "Nombre: " . $form_entrada["nombre"];
    $salida .= "<br>Apellidos: " . $form_entrada["apellidos"];
    
    //instanciamos el objeto para generar la respuesta con ajax
    $respuesta = new xajaxResponse();
    //escribimos en la capa con id="respuesta" el texto que aparece en $salida
    $respuesta->assign("mensaje", "innerHTML", $salida);
    //tenemos que devolver la instanciaci�n del objeto xajaxResponse
    //$xajax->setFlag('debug', true);
    return $respuesta;
}

//registramos la funci�n creada anteriormente al objeto xajax
$xajax->register(XAJAX_FUNCTION, "procesar_formulario");

//El objeto xajax tiene que procesar cualquier petici�n
$xajax->processRequest();
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
            <form id="formulario">
                Nombre: <input type="text" name="nombre" >
                <br>
                Apellidos: <input type="text" name="apellidos">
                <br>
                <input type="button" value="Enviar"  onclick="xajax_procesar_formulario(xajax.getFormValues('formulario'))">
            </form>
        </div>
    </body>
</html>
