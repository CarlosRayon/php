<?php
session_start(); //Inicimaos session para usar variables de session
//incluyo el archivo con el array que usaremos
require "./arrayModulos.php";
?>

<!DOCTYPE html>
<!--
Carlos Rayon Alvarez DWES Tarea04
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link  rel="stylesheet" type="text/css" href="style/estiloweb.css">
        <title>paso 1</title>
    </head>
    <body>
        <h1>1.Datos personales del solicitante</h1>
        <div id="contenido">
            <!--Formulario. Mandare los datos con get para ir viendo las variables que paso. Seria mas correcto con el post-->
            <form id="formulario" name="formulario" action="paso2.php" method="post">
                <fieldset>
                    <p><b> Año academico</b> 2017-2018</p>
                    <p>
                        <label for="apellido">Primer apellido:</label>
                        <input id="apellido"  type="text" name="apellido" placeholder="Introducir apellido" value="<?php
                        if (isset($_SESSION['nombre'])) {
                            echo $_SESSION['apellido']; //Para conservar los datos introduccios por el usuario en los input si ya habia introduccido sus datos
                        }
                        ?>" required ><span>*&nbsp;&nbsp;</span>

                        <label for="nombre">Nombre:</label>
                        <input id="nombre"  type="text" name="nombre" placeholder="Introducir nombre" value="<?php
                        if (isset($_SESSION['nombre'])) {
                            echo $_SESSION['nombre']; //Para conservar los datos introduccios por el usuario en los input si ya habia introduccido sus datos
                        }
                        ?>" required>
                    </p>

                    <p>
                        <label for="fechanacimiento">Fecha de nacimiento</label>
                        <input id="fechanacimiento" type="date" name="fechanacimiento" value="<?php
                        if (isset($_SESSION['fechanacimiento'])) {
                            echo $_SESSION['fechanacimiento']; //Para conservar los datos introduccios por el usuario en los input si ya habia introduccido sus datos
                        }
                        ?>" required ><span>*</span>&nbsp;&nbsp;
                        <span>Sexo:</span>
                        <label><input id="sexo" type="radio" name="sexo" value="hombre" required <?php
                        if (!empty($_SESSION['sexo']) && ($_SESSION['sexo'] == 'hombre')) {
                            echo "checked"; //Para conservar el checkbox marcado
                        }
                        ?>>Hombre</label>
                        <label><input id="sexo" type="radio" name="sexo" value="mujer" <?php
                        if (!empty($_SESSION['sexo']) && ($_SESSION['sexo'] == 'mujer')) {
                            echo "checked"; //Para conservar el checkbox marcado
                        }
                        ?> >Mujer</label>
                    </p>

                    <p>
                        <label for="dni">D.N.I. o equivalente</label>
                        <input id="dni" type="text" name="dni" placeholder="Introducir DNI" value="<?php
                        if (isset($_SESSION['nombre'])) {
                            echo $_SESSION['dni']; //Para conservar el dni
                        }
                        ?>" required>
                    </p>

                    <p><label for="selector">CicloFormativo</label>
                        <select name="selector">
                            <?php
                            //Mostramos los ciclos en un selector de forma dinamica sacando los datos del array
                            $mostrarCiclos = "";
                            foreach ($curso as $ciclos => $modulos) {
                                $mostrarCiclos .= "<option value='$ciclos'>$ciclos</option>";
                            }
                            echo $mostrarCiclos;
                            ?>
                        </select>
                    </p>

                    <p>
                        <input id="paso2" type="submit" name="paso2" value="paso2">
                    </p>
                </fieldset> 
            </form>

            <!--Para evitar la validacin mediante HTML5 pongo este boton en otro formulario 
            indenpendiente para poder pasar al paso dos. Me di cuenta de este detalle en la pruebas finales-->
            <form id="formu" action="paso2.php" method="post">
                <p><b>Pulse este boton para reiniciar datos:</b>
                    <input id="cerrar" type="submit" name="cerrar" value="cerrar">
                </p>
            </form>

        </div>
    </body>
</html>
