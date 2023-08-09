<?php
/*
UPDATE en base de datos con mysqli procedimientos
 */
$conexion = conectarBaseDatos();
$query = "UPDATE `usuarios` SET `nombreusuario` = 'valorcam' WHERE `idusuario` = 10";

if (mysqli_query($conexion, $query)) {
    echo "insercion efectuada";
    echo "filas afectadas " . mysqli_affected_rows($conexion);
} else {
    echo "error codigo:" . mysqli_errno($conexion) . " mensaje error " . mysqli_error($conexion);
}

mysqli_close($conexion);
