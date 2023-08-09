<?php
/*
  Conexion base datos forma orientada a objetos:
 * -Podria meter todo en una funccion y hacer que me devuelva la conexion
 * -Si quiero usar otra base datos:$conexion->select_db("otra_bd");
 */

//Variables para la conexion Las puedo definir como constantes si se que no van a cambiar
$db_host = "localhost";
$db_usuario = "root";
$db_password = "";
$db_nombreBaseDatos = "nombreBaseDatos";

@$conexion = new mysqli($db_host, $db_usuario, $db_password, $db_nombreBaseDatos);

/* opcional
  $conexion= new mysqli();
  $conexion->connect($host, $user, $password, $database, $port, $socket);
 */

if ($conexion->connect_errno) {
    printf("Error de conexión: %s\n", $conexion->connect_error);
    exit();
} else {
    echo "conexion establecida"; //Opcional
}



//En una funcion:
function conectarBaseDatos()
{
    $db_host = "localhost";
    $db_usuario = "root";
    $db_password = "";
    $db_nombreBaseDatos = "nombreBaseDatos";

    @$conexion = new mysqli($db_host, $db_usuario, $db_password, $db_nombreBaseDatos);

    if ($conexion->connect_errno) {
        printf("Error de conexión: %s\n", $conexion->connect_error);
        exit();
    } else {

        return $conexion; //No hay error devolvemos la conexion
    }
}
