<?php
require_once './required/xajax/xajax_core/xajax.inc.php';
require_once './required/base_datos.php';
require_once './required/Modulo.php';
require_once './required/xajax_funciones.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insercion de modulos</title>
        <link href="style/css.css" rel="stylesheet" type="text/css"/>
          <?php
            //En el <head> indicamos al objeto xajax se encargue de generar el javascript necesario 
            $xajax->printJavascript("./required/xajax"); //Parametro ruta donde estan los archivos xajas descomprimidos
            ?> 
        <script src="required/js_funciones.js"></script>
    </head>

    <body>
        <div id="contenedor">
            <h2>Insercion de modulos</h2>

            <form id="formulario" name="formulario">
                <p>
                    <label for="codigo">Codigo</label>
                    <input type="text" id="codigo" name="codigo"><span id="mscodigo"></span>
                <p/>
                <p>
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre"><span id="msnombre"></span>
                <p/>
                <p>
                    <label for="horas">Horas</label>
                    <input type="number" id="horas" name="horas"><span id="mshoras"></span>
                <p/>
                <p>
                    <label for="curso">Curso</label>
                    <input type="number" id="curso" name="curso"><span id="mscurso"></span>
                <p/>
                <p>
                    <label for="plazas">Plazas</label>
                    <input type="number" id="plazas" name="plazas"><span id="msplazas"></span>
                <p/>
                <p>
                    <label for="ciclo">Ciclo</label>
                    <input type="text" id="ciclo" name="ciclo"><span id="msciclo"></span>
                <p/>

                <p>
                    <input type="button" id="insertar" name="insertar" value="INSERTAR" onclick="xajax_procesarFormulario(xajax.getFormValues('formulario'))">
                </p>

                <div id="modulos">
                   
                </div> 
                <div id="error"></div>
            </form>           
        </div>

    </body>
</html>
