<?php

/*
  Archivo PHP que nos servira para establecer la conexion a la base de datos
 */

//Variables para la conexion
$db_host = "localhost";
$db_nombreBaseDatos = "dwes";
$db_password = "abc123.";
$db_usuario = "dwes";

// Abrimos la base datos y capturamos los errores
try {
    //Para que el servidor utilize codificacion UTF-8
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

    //Establecemos la conexion mediante PDO
    $conexion = new PDO("mysql:host=$db_host;dbname=$db_nombreBaseDatos", $db_usuario, $db_password, $opciones);
    //Modificamos parametros que afectan a la conexion
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    $error = $ex->getCode();
    $mensaje = $ex->getMessage();
}
?>
