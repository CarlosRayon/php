<?php
session_start();

if (!isset($_SESSION['seleccion'])) {
    $_SESSION['seleccion'] = array();
}

//se carga el array de sesion del alumno con los datos personales.
if (isset($_POST['nombre'])) { //viene de paso1.php
    $_SESSION['alumno']['apellido'] = $_POST['apellido'];
    $_SESSION['alumno']['nombre'] = $_POST['nombre'];
    $_SESSION['alumno']['fNacimiento'] = $_POST['fNacimiento'];
    $_SESSION['alumno']['sexo'] = $_POST['sexo'];
    $_SESSION['alumno']['dni'] = $_POST['dni'];
    $_SESSION['alumno']['ciclo'] = $_POST['ciclo'];
}

$cicloAlumno = $_SESSION['alumno']['ciclo']; //guardo el ciclo en una variable, para que sea más legible el código
//si se ha pulsado un boton...
if (isset($_POST['boton'])) { //viene de paso2.php
    if ($_POST['boton'] == 'Volver') { //vuelve a la pagina anterior
        header('location: paso1.php');
    }

    if ($_POST['boton'] == 'Todos') { //carga todos los módulos del ciclo que tienen plazas disponibles
        foreach ($_SESSION['fp'][$_SESSION['alumno']['ciclo']] as $modulo => $valor) {
            if ($valor['plazas'] > 0) {
                $_SESSION['seleccion'][] = $modulo;
            }
        }
        header('location: paso2.php');
    }

    if ($_POST['boton'] == 'Quitar') { //quita todos los módulos seleccionados
        unset($_SESSION['seleccion']);
        header('location: paso2.php');
    }


    if ($_POST['boton'] == 'Ver') { //comprueba los módulos seleccionados
        $_SESSION['seleccion'] = $_POST['seleccion'];
        mostrarseleccionados();
        header('location: paso2.php');
    }

    if ($_POST['boton'] == 'Seguir') { //va a la página siguiente
        header('location: paso3.php');
    }
}

function mostrarModulos($ciclo)
{
    //muestra los módulos
    echo "<table>";
    foreach ($_SESSION['fp'][$ciclo] as $modulo => $valor) {
        if ($valor['plazas'] > 0) { //si no hay plazas, no se muestran
            echo "<tr>";
            if (in_array($modulo, $_SESSION['seleccion'])) {
                echo ("<tr><td> $modulo </td><td><input type='checkbox' checked name='seleccion[]' value='$modulo'></td></tr>");
            } else {
                echo ("<tr><td> $modulo </td><td><input type='checkbox' name='seleccion[]' value='$modulo'></td></tr>");
            }
        }
    }
    echo "</table>";
}

function mostrarseleccionados()
{
    //muestra los módulos seleccionados por el alumno
    echo "<table>";
    foreach ($_SESSION['seleccion'] as $modulos) {
        echo "<tr><td>$modulos</td></tr>";
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="DWES04.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DWES04 - Solución</title>
    </head>
    <body>
        <div id="marco2">
            <div id="cuadro2">
                <div id="titulo2">
                    <h3>2. Selección de los módulos</h3>
                </div>
                <form name="opcion" action="paso2.php" method="POST">
                    <div id="modulos">
                        <div id="cuadrado">
                            <h4>Módulos candidatos</h4><br>
                            <div id="candidatos">
                            <?php mostrarModulos($cicloAlumno); ?>  
                            </div>
                        </div>
                        <div id="cuadrado">
                            <h4>Módulos seleccionados</h4><br>
                            <div id="seleccionados">
                                <?php mostrarseleccionados(); ?>
                            </div>
                        </div>
                        <div id="botones2">
                            <input class="boton2" type="submit" value="Volver" name="boton" />
                            <input class="boton2" type="submit" value="Todos" name="boton" />
                            <input class="boton2" type="submit" value="Quitar" name="boton" />
                            <input class="boton2" type="submit" value="Ver" name="boton" />
                            <input class="boton2" type="submit" value="Seguir" name="boton" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
