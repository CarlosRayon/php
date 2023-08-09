<!--
POO_paso3.php
Muestro los datos y confirmo la matricula
-->
<?php
//Incluyo primero las clases
require_once './clases/Alumno.php';
require_once './clases/Modulo.php';
require_once './clases/Seleccion.php';
require_once './clases/BaseDatos.php';
require_once './clases/estaticos.php';
session_start();

/* Si pulso el boton CAMBIAR me redirrecciono a POO_paso2.php */
if (isset($_POST["cambiar"])) {
    header("location:POO_paso2.php");
}


/* Si pulso el boton CONFIRMAR compruebo todos los datos sean correctos */

if (isset($_POST["confirmar"])) {

    if ($_SESSION["seleccion"]->verHorasTotales() > 1000) {
        echo "<p id='error'>Limite de 1000 horas sobrepasado. Quite modulos</p>";
        header("refresh:3; url=POO_paso2.php");
    } elseif ($_SESSION["seleccion"]->verHorasTotales() == 0) {
        echo "<p id='error'>No tiene ningun modulo seleccionado</p>";
        header("refresh:3; url=POO_paso2.php");
    } else if (Estaticos::validarArchivo($_FILES['archivo']) != 0) {

        if (Estaticos::validarArchivo($_FILES['archivo']) == 1) {
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=POO_paso3.php">';
            echo "<p id='error'>No se pueden subir los ficheros de mas de 1 Mb.</p>";
        }

        if (Estaticos::validarArchivo($_FILES['archivo']) == 2) {
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=POO_paso3.php">';
            echo "<p id='error'>Archivo incorrecto. Solo archivos RAR o ZIP</p>";
        }
    } else {//Si todo ha ido bien
        /* Guardo en nombre del archivo (si es que le tenemos) en el objeto alumno para completar sus datos y pasar a hacer las transiciones */
        $_SESSION["alumno"]->setArchivoAlumno($_FILES['archivo']['name']);

        //inserto el alumno en la tabla matricula
        if ($_SESSION["baseDatos"]->insertarAlumno()) {
            $contador=$_SESSION["baseDatos"]->contarMatriculas();
            //elimino los archivos de sesion del servidor
            session_destroy();

            //Redirecciono a la pagina POO_paso1.php y muestro mensaje confirmacion
            echo "<p id='matriculado'>Usted se ha matriculado con exito!! Numero de matricula $contador</p>";
            header("refresh:4; url=POO_paso1.php");
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>POO_paso3</title>
        <link type="text/css" rel="stylesheet" href="CSS/nueva.css">
    </head>
    <body>
        <header>
            <h2>3. Confirmar la matricula</h2>
        </header>

        <section>
            <div id="mostrardatos">

                <div id="datospersonales">
                    <h3>Datos personales</h3>
                    <?php
                    //Muestro los datos personales
                    Estaticos::mostrarDatosPersonales();
                    ?>
                </div>
                <div id="modulos">
                    <h3>Modulos elegidos</h3>                   
                    <?php
                    //Muestro los  modulos eleguidos
                    Estaticos::mostrarModulosEleguidosFinal($_SESSION["seleccion"]->getModulosEleguidos());
                    ?>
                    <p>Total de horas:<?php echo $_SESSION["seleccion"]->verHorasTotales(); ?></p>                   
                </div>    
            </div>
            <div id="botones">
                <form id="formulario" action="POO_paso3.php" method="post" enctype="multipart/form-data">
                    <div id="fichero">
                        <p><b>Subir Ficheros:</b> <input type="file" name="archivo" value="Enviar documento"></p>
                    </div>
                    <p class="botones">   
                        <input type="submit" value="CAMBIAR" name="cambiar" class="boton">
                        <input type="submit" value="CONFIRMAR" name="confirmar" class="boton">
                    </p>
                </form>
            </div>
        </section>
    </body>
</html>







