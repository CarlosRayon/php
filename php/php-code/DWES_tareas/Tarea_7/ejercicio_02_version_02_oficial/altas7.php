<?php
require_once './required/xajax/xajax_core/xajax.inc.php';
require_once './required/base_datos.php';
require_once './required/Modulo.php';
require_once './required/funciones_xajax.php';
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
        <script src="required/funciones_js.js"></script>
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
                    <input type="text" id="nombre" name="nombre" minlength="3" maxlength="50"><span id="msnombre"></span>
                <p/>
                <p>
                    <label for="horas">Horas</label>
                    <input type="number" id="horas" name="horas" value="1"><span id="mshoras" ></span>
                <p/>
                <p>
                    <label for="curso">Curso</label>
                    <input type="number" id="curso" name="curso" min="1" max="2" value="1" ><span id="mscurso"></span>
                <p/>
                <p>
                    <label for="plazas">Plazas</label>
                    <input type="number" id="plazas" name="plazas" min="1" max="30" value="1"><span id="msplazas"></span>
                <p/>
                <p>
                    <label for="ciclo">Ciclo</label>
                    <input type="text" id="ciclo" name="ciclo"><span id="msciclo"></span>
                <p/>

                <p>
                    <input type="button" id="insertar" name="insertar" value="INSERTAR">
                </p>

                <div id="modulos">

                </div> 
                <div id="confirmacion"></div>
            </form>           
        </div>

        <!--Segun la correccion tutor deberia usar
        <input type="text" name="codigo" value="" id="codigo"  onchange="compruebaCodigo()"/>            
        <input type="text" name="horas" value="" id="horas"  onchange="compruebaHoras()"/>           
        <label fron="curso">Curso</label>
        <input type="text" name="curso" value="" id="curso"  />
        <input type="text" name="ciclo" value="" id="ciclo"  onchange="compruebaCiclo()"/>
        -->
    </body>
</html>
