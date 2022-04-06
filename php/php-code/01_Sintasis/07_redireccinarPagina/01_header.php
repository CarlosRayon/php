<?php

/*
La funcion header se usa para redireccionar a otra paginas
 */

header("location:POO_paso2.php"); //Redirecciona directamente

header("refresh:3; url=paso1.php"); //Redirecciona pasado el tiempo(segundos) del refresh

//Ejemplo uso:
if (isset($_POST['cerrar'])) { //Se se pulsa cerrar
    echo '<h2>Se cierra la matriculación</h2>'; //Escribo algo
    session_destroy(); //Puedo hacer cualquier cosa antes
    header("refresh:3; url=paso1.php"); //A los 3 segundos me redirrecciona
}
