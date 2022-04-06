<?php

//RECUERDA!!! MYSQLI solo permite bindear valores por tipo ?
//CREO LA QUERY
$query = "DELETE FROM `usuarios` WHERE `usuarios`.`idusuario` = ?";
$numero = 10; //Valor que quiero pasar a la query
$stmt = $conexion->prepare($query); //La preparo

$ok = $stmt->bind_param("i", $numero); //blindeo valores con la sentencia

$ok = $stmt->execute(); //ejecuto

if ($ok == false) //Algo fallo
{
    echo "error al ejecutar la consulta";
    exit();
} else { //todo bien

    echo "Registro borrado<br>";
    $stmt->close();
}
