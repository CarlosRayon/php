<?php
session_start();
require_once 'datosFP.php';


if (!isset($_SESSION['fp'])) { //si no existe fp, es que es una nueva sesión. Inicializo las variables y arrays
    $_SESSION['fp'] = $fp;
}
if (isset($_POST['cerrar'])) { //Se se pulsa cerrar la matriculación
    echo '<h2>Se cierra la matriculación</h2>';
    session_destroy();
    header("refresh:3; url=paso1.php");
}

//cargamoso las variables con la información del alumno
$apellido = isset($_SESSION['alumno']['apellido']) ? $_SESSION['alumno']['apellido'] : "";//usamos un ternario
$nombre = isset($_SESSION['alumno']['nombre']) ? $_SESSION['alumno']['nombre'] : "";
$fNacimiento = isset($_SESSION['alumno']['fNacimiento']) ? $_SESSION['alumno']['fNacimiento'] : "";
$sexo = isset($_SESSION['alumno']['sexo']) ? $_SESSION['alumno']['sexo'] : "";
if ($sexo == "Hombre") {
    $hombre = "checked=''";
    $mujer = "";
} else {
    $hombre = "";
    $mujer = "checked=''";
}
$dni = isset($_SESSION['alumno']['dni']) ? $_SESSION['alumno']['dni'] : "";
$ciclo = isset($_SESSION['alumno']['ciclo']) ? $_SESSION['alumno']['ciclo'] : "";

function mostrarCiclos($miCiclo)
{
    //carga la lista desplegable con los ciclos existentes
    echo '<select class="datos" name="ciclo" >';
    foreach ($_SESSION['fp'] as $ciclo => $valor) {
        $seleccionada = ($miCiclo == $ciclo) ? "selected " : "";  // ------ fijar como selected?? 
        echo "<option value='$ciclo' $seleccionada>$ciclo</option>";
    }
    echo '</select>';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="DWES04.css" rel="stylesheet" type="text/css"/>
        <title>DWES04 - Solución</title>
    </head>
    <body>
        <div id="marco">
            <div id="cuadro">
                <div id="titulo">
                    <h3>1. Datos personales del solicitante</h3>
                </div>
                <div id="cuadroDatos">
                    <br/><h4>Año académico: 2017-2018</h4><br/>
                    <form name="solicitante" action="paso2.php" method="POST">
                        <table width="99%">
                            <tr class="tablas">
                                <td ><label>Primer apellido:</label><input class="datos" type="text" value="<?php echo $apellido; ?>" name="apellido" required="">*</td>
                                <td ><label>Nombre:</label><input class="datos" type="text" value="<?php echo $nombre; ?>" name="nombre" /></td>
                            </tr>
                            <tr class="tablas">
                                <td><label>Fecha nacimiento:</label><input class="datos" type="date" value="<?php echo $fNacimiento; ?>" name="fNacimiento" required=""/>*</td>
                                <td><label>Sexo:</label>
                                    <input type="radio" name="sexo" value="Hombre" <?php echo $hombre; ?>/>Hombre
                                    <input type="radio" name="sexo" value="Mujer" <?php echo $mujer; ?>/>Mujer</td>
                            </tr>
                            <tr class="tablas">
                                <td><label>D.N.I o equivalente:</label><input class="datos" type="text" value="<?php echo $dni; ?>" name="dni"/></td>
                            </tr>
                            <tr class="tablas">
                                <td><label>Ciclo formativo: </label><?php mostrarCiclos($ciclo); ?></td>
                            </tr>
                        </table>
                        <div id="botones">
                            <input type="submit" value="Ir al paso 2" name="boton"/>
                        </div>
                    </form>
                    <form action="paso1.php" method="POST"><input type="submit" value="Cerrar" name="cerrar"/></form>
                </div>
            </div>
        </div>
    </body>
</html>
