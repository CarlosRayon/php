<?php

/*
  Conexion a base datos forma procedimental:
    -Puedo meter todo en una funcion y que me devuelva la conexion.
    -Si quiero usar otra base datos:mysqli_select_db($conexion, "otra_bd");
 */

// Variables de Conexion
$db_servidor = "localhost";
$db_nombreBBDD = "nombreBaseDatos";
$db_usuario = "root";
$db_password = "";

//Variables para la conexion Las puedo definir como constantes si se que no van a cambiar
$conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_nombreBBDD);

// Comprobamos la Conexion
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
} else {
    echo "conexion establecida";
}




//TODO EN UNA FUNCION:
function conectarBaseDatos()
{
    // Variables de Conexion
    $db_servidor = "localhost";
    $db_nombreBBDD = "nombreBaseDatos";
    $db_usuario = "root";
    $db_password = "";

    $conexion = mysqli_connect($db_servidor, $db_usuario, $db_password, $db_nombreBBDD);

    // Comprobamos la Conexion
    if (mysqli_connect_errno()) {
        printf("Error de conexión: %s\n", mysqli_connect_error());
        exit();
    } else {
        return $conexion;
    }
}
