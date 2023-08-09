<!--
POO_paso2.php
En esta web el usuario escogera los modulos del ciclo
-->
<?php
//Incluyo primero las clases
require_once './clases/Alumno.php';
require_once './clases/Modulo.php';
require_once './clases/Seleccion.php';
require_once './clases/BaseDatos.php';
require_once './clases/estaticos.php';

//Despues inicio la sesion
session_start();

/* Si he pulsado el boton volver de POO_paso2.php
   Me redirecciono a la pagina POO_paso1.php
 */
if (isset($_GET['volver'])) {//si la variable esta definida
    header("location:POO_paso1.php");
}

/* Si he pulsado el boton seguir de POO_paso2.php
   Me redirecciono a la pagina POO_paso3.php
 */
if (isset($_GET['seguir'])) {//si la variable esta definida
    header("location:POO_paso3.php");
}

/* valido ciclo elegido. Si hemos cambiado de ciclo respecto al original, vacio la lista de seleccion de ciclos */
if (isset($_GET["irpaso2"]) && isset($_SESSION["alumno"])) {

    if ($_GET["cicloformativo"] != $_SESSION["alumno"]->getCicloAlumno()) {
        echo "<p id='error'>Ha cambiado de ciclo. Se borra la seleccion original</p>";
        $_SESSION["seleccion"]->vaciarModulo();
    }
}

/* Compruebo si vengo de POO_paso1 y creo o modifico un objeto alumno que guardo
   en la variable de session $_SESSION["alumno"]
 */
if (isset($_GET["irpaso2"])) {
    Alumno::crearAlumno($_GET["irpaso2"]);
}

/* Creo una variable de session con los modulos del ciclo seleccionado SOLO cuando venga de POO_paso1
   de esta menera evito la redundancia de datos en esta variable de session ?¿?¿¿¿?¿(Al recargar como la evito)?¿?¿?¿
 */
if (isset($_GET["irpaso2"])) {
    $_SESSION["listaModulos"] = $_SESSION["baseDatos"]->obtenerModulos($_SESSION["alumno"]->getCicloAlumno());
}

/* Si he pulsado el boton INSERTAR, añado el modulo a la seleccion */
if (isset($_GET["insertar"])) {
    $_SESSION["seleccion"]->añadirModulo2($_SESSION["listaModulos"], $_GET["insertar"]);
}

/* Si pulso el boton QUITAR de la seleccion de modulos, borro ese modulo */
if (isset($_GET["quitar"])) {
    $_SESSION["seleccion"]->eliminarModulos($_GET["quitar"]);
}

/*Si pulso el boton TODOS añado todos los modulos*/
if (isset($_GET["todos"])) {
    $_SESSION["seleccion"]->añadirTodosModulos($_SESSION["listaModulos"]);
}

/* Si pulso el boton vaciar llamo a la funcion que me vacia el array de modulos del objeto de seleccion */
if (isset($_GET["vaciar"])) {
    $_SESSION["seleccion"]->vaciarModulo();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>POO_paso2</title>
        <link type="text/css" rel="stylesheet" href="CSS/nueva.css">
    </head>
    <body>
        <header>
            <h2>2.Seleccion de los modulos</h2>
        </header>

        <section>
            <div id="modulos">

                <div id="moduloscandidatos">

                    <?php
                    
                    echo "<h2>Modulos Candidatos de " . $_SESSION["listaModulos"][0]["ciclo"] . "</h2>";
                    echo "<form id='formularioCandidatos' action=" . $_SERVER['PHP_SELF'] . " method='get'>";
                    Estaticos::mostrarModulosCandidatos($_SESSION["listaModulos"]);
                    echo "</form>";
                    
                    ?>               
                </div>

                <div id="modulosseleccionados">
                    <?php
                    
                    echo "<h2>Modulos Seleccionados de " . $_SESSION["listaModulos"][0]["ciclo"] . "</h2>";
                    echo "<form id='formularioCandidatos' action=" . $_SERVER['PHP_SELF'] . " method='get'>";
                    Estaticos::mostrarModulosEleguidos($_SESSION["seleccion"]->getModulosEleguidos());
                    echo "</form>";
                    
                    ?>

                </div>
                <form id="formularioCandidatos" action="" method="get">

                </form>
            </div>

            <div id="botones">
                <form id="formulario" action="POO_paso2.php" method="get">

                    <p class="botones">   
                        <input type="submit" value="VOLVER" name="volver" class="boton">
                        <input type="submit" value="TODOS" name="todos" class="boton">
                        <input type="submit" value="VACIAR" name="vaciar" class="boton">
                        <input type="submit" value="SEGUIR" name="seguir" class="boton">
                    </p>
                </form>
            </div>
        </section>

    </body>
</html>
