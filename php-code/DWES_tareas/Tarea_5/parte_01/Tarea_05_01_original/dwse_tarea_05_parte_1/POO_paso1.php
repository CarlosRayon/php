<!--
POO_paso1.php
Esta pagina servira para que el usuario introdroduzca sus datos
-->

<?php
/* Incluyo primero las clases para que se puedan guardar los datos en las variables de session */
require_once './clases/Alumno.php';
require_once './clases/Seleccion.php';
require_once './clases/BaseDatos.php';
require_once './clases/estaticos.php';
session_start();

//Creo una variable de session que sera un objeto de la base de datos
$_SESSION["baseDatos"] = new BaseDatos();

//Creo variable de session que sera un array de los ciclos
$_SESSION["ciclos"] = $_SESSION["baseDatos"]->verCiclos();

/* Variable de session objeto/modulo */
if (!isset($_SESSION["seleccion"])) {
    $_SESSION["seleccion"] = new Seleccion();
};
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>POO_paso1</title>
        <link type="text/css" rel="stylesheet" href="CSS/nueva.css">
    </head>
    <body>
        <header>
            <h1>1.Datos personales del solicitante</h1>
        </header>
        <section>
            <?php
            if (isset($_SESSION["alumno"])) {//Si el alumno ya ha sido creado...(mostrara el formulario con los datos del alumno) 
                Estaticos::formularioDevueltaPaso1($_SESSION["alumno"], $_SESSION["ciclos"]);
            } else {//Si no ha sido creado el alumno(esto sera el formulario inicial que se muestre)
                Estaticos::formularioInicialPaso1($_SESSION["ciclos"]);
            }
            ?>
        </section>

    </body>
</html>
