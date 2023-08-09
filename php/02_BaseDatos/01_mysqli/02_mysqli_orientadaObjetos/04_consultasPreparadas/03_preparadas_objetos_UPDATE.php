<?php

/*
SENTENCIA PREPARADA CON MYSQLI UPDATE
RECUERDA!!! MYSQLI solo permite bindear valores por tipo ?
 */

//Creo la query
$query = "UPDATE `usuarios` SET `passusuario` = ? WHERE `usuarios`.`idusuario` = ?;";

$stmt = $conexion->prepare($query); //Preparo

$ok = $stmt->bind_param("si", $passusuario, $idusuario); //bindeo

$passusuario = "otra"; //Paso lo parametros al bindeo
$idusuario = 12;

$ok = $stmt->execute(); //Ejecuto


if ($ok == false) {
    echo "error al ejecutar la consulta";
    exit();
} else {

    echo "Registro actualizado<br>";
    $stmt->close();
}
