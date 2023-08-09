<?php

/*
INSERT en base de datos con mysqli procedimientos
 */
$conexion = conectarBaseDatos(); //Conectamos base datos
$query = "INSERT INTO `usuarios` (`idusuario`, `nombreusuario`, `emailusuario`, `passusuario`) VALUES (NULL, 'nuevo', 'kakdfa@kfjka', 'passssss')";

if ($conexion->query($query)) {
    echo "insercion efectuada";
    echo "filas afectadas " . $conexion->affected_rows;
} else {
    echo "error codigo:" . $conexion->errno . " mensaje error " . $conexion->error;
}

$conexion->close();
