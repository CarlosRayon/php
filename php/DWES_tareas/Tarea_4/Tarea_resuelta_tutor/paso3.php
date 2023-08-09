<?php
session_start();

if (isset($_POST['cambiar'])) { //Se quiere hacer cambios y volvemos a paso2.php
    header('location: paso2.php');
}
if (isset($_POST['confirmar'])) { //cierra la matriculación del alumno
    if ($_SESSION['totalHoras'] > 0 && ($_SESSION['totalHoras']) < 10000) {
        // --------- gestionar la matrícula --------------            
        actualizarPlazas();   // ------------------------------ restar plazas 
        subirFicheros();            //----------  mandamos los ficheros al servidor

        if (!isset($_SESSION['numMatricula'])) { // ----------- contador de matrículas
            $_SESSION['numMatricula'] = 1;
        } else {
            $_SESSION['numMatricula'] ++; // ---incrementamos el número de matriculas
        }


        echo "<div style='border:2px solid cyan; width: 15%; padding:10px 20px 10px 20px; font-size:20px;'><label>Matrícula número: </label>"
        . "<label style='font-size:30px;'>$_SESSION[numMatricula]</label></div>";
        borrarDatosAlumno();        // ----------borramos datos personales y módulos
        header("refresh:3; url=paso1.php"); // ----------------- volvemos al paso1                
    }else {
        echo "tienen que sumar menos de 1000";
        header("refresh:2;url=paso2.php");    // --- obligamos a hacer otra elección
    }
}

function mostrarModulosElegidos()
{
    // muestra los módulos elegidos        
    foreach ($_SESSION['seleccion'] as $modulo) {
        echo "<h5 class='datos'>$modulo</h5>";
    }
}

function actualizarPlazas()
{
    // restar plazas al módulo seleccionado. Tenemos el acceso a través del fp y el módulo
    foreach ($_SESSION['seleccion'] as $modulo) {
        $_SESSION['fp'][$_SESSION['alumno']['ciclo']][$modulo]['plazas'] --;
    }
}

function mostrarHorasMatriculadas()
{
    //calcula y muestra el total de horas de los módulos
    $_SESSION['totalHoras'] = 0;
    foreach ($_SESSION['seleccion'] as $modulo) {
        $valor = $_SESSION['fp'][$_SESSION['alumno']['ciclo']][$modulo]['horas'];
        $_SESSION['totalHoras'] = $_SESSION['totalHoras'] + $valor;
    }

    if ($_SESSION['totalHoras'] > 1000) { //si supera el límite de hora, las muestro en rojo (el mensaje lo pongo al confirmar)
        echo "<h5 class='rojo' >" . $_SESSION['totalHoras'] . "</h5>";
    } else {
        echo "<h5 class='datos' color='black'>" . $_SESSION['totalHoras'] . "</h5>";
    }
}

function borrarDatosAlumno()
{
    //inicializa los módulos elegidos por el alumno actual        
    unset($_SESSION['seleccion']);
    unset($_SESSION['alumno']);
}

function subirFicheros()
{
    //manda los ficheros al servidor
    if (isset($_FILES['archivos'])) {
        $totFile = count($_FILES["archivos"]["tmp_name"]);
        for ($i = 0; $i < $totFile; $i++) {
            $prefijo = substr(md5(uniqid(rand())), 0, 6); //    --------- generar un pefijo aleatorio ----------------
            if ($_FILES['archivos']['size'][$i] > 0) {
                if ($_FILES['archivos']['size'][$i] > 5000) { //  ---------- tamaño aproximado de 5Mb 
                    echo "<p>No se pueden subir los ficheros de mas de 5 Mb.</p>";
                    echo '<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=paso3.php">';
                    exit();
                } else { //Tiene que estar creado en el servidor la carpeta "ficheros" en el servidor web
                    if (!move_uploaded_file($_FILES["archivos"]["tmp_name"][$i], "ficheros/" . $prefijo . $_FILES["archivos"]["name"][$i])) {

                        echo "<h1>No se ha podido subir el archivo " . $_FILES['archivos']['name'][$i] . "</h1>";
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DWES04 - Solución</title>
        <link href="DWES04.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="marco3">
            <div id="cuadro">
                <form name="opciones" action="paso3.php" method="POST" enctype="multipart/form-data">
                    <div id="titulo">
                        <h3>3. Confirmar la matricula</h3>
                    </div>
                    <div id="cuadroDatos">
                        <div id="datosPersonales">
                            <h4>Datos personales</h4><br>
                            <table>
                                <tr><td>Apellido</td><td><?php echo $_SESSION['alumno']['apellido']; ?></td></tr>
                                <tr><td>Nombre</td><td><?php echo $_SESSION['alumno']['nombre']; ?></td></tr>
                                <tr><td>Fecha de nacimiento</td><td><?php echo $_SESSION['alumno']['fNacimiento']; ?></td></tr>
                                <tr><td>Sexo</td><td><?php echo $_SESSION['alumno']['sexo']; ?></td></tr>
                                <tr><td>D.N.I. o equivalente</td><td><?php echo $_SESSION['alumno']['dni']; ?></td></tr>
                                <tr><td>CICLO:</td><td><?php echo $_SESSION['alumno']['ciclo']; ?><td></tr> 
                            </table>
                        </div>
                        <div id="modulosElegidos">
                            <br><h4>Módulos elegidos</h4>
                            <?php mostrarModulosElegidos(); ?>
                        </div>
                        <div id="horasMatriculadas">
                            <br><h4>Total de horas matriculadas</h4>
                            <?php mostrarHorasMatriculadas(); ?>
                        </div>
                        <div id="documentosComunes">                    
                            <label>Documentos comunes</label>
                        </div>
                        <div>                    
                            <div class="recuadros">                    
                                <label>Informe de vida laboral</label>
                            </div>
                            <div class="recuadros">                    
                                <input type="file" name="archivos[]" >
                            </div>
                        </div>
                        <div>                    
                            <div class="recuadros">                    
                                <label>Justificante de cargas familiares o enfermedad</label>
                            </div>
                            <div class="recuadros">                    
                                <input type="file" name="archivos[]" >
                            </div>
                        </div>
                        <div>                    
                            <div class="recuadros">                    
                                <label>Certificado de empadronamiento</label>
                            </div>
                            <div class="recuadros">
                                <input type="file" name="archivos[]" >
                            </div>
                        </div>
                    </div>
                    <div id="botones2">
                        <input class="boton2" type="submit" name="cambiar" value="Cambiar"  />
                        <input class="boton2" type="submit" name="confirmar" value="Confirmar"  />
                    </div>                    
                </form>
            </div>
        </div>
    </body>
</html>
