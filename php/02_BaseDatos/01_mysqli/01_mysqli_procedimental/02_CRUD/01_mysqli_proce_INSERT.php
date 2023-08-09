<?php

/*
INSERT en base de datos con mysqli procedimientos
 */
$conexion = conectarBaseDatos(); //Conectamos base datos
$query = "INSERT INTO `usuarios` (`idusuario`, `nombreusuario`, `emailusuario`, `passusuario`) VALUES (NULL, 'nuevo', 'kakdfa@kfjka', 'passssss')";

if (mysqli_query($conexion, $query)) {
    echo "insercion efectuada";
    echo "filas afectadas " . mysqli_affected_rows($conexion);
} else {
    echo "error codigo:" . mysqli_errno($conexion) . " mensaje error " . mysqli_error($conexion);
}

mysqli_close($conexion);
