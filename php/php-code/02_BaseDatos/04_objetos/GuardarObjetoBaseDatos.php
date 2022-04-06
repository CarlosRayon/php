<?php

/* INCOMPLETA
Para guardar objeto en la base de datos los tenemos que serializar
 */

$a = new Usuarios("nuevousuario", "objeto@usuario", "passdelobjeto");
$usuario = serialize($a);

/*Con el objeto serializado, lo insertamos en un campo Varchar de la tabla*/

$conexion = conectarBaseDatos(); //Conectamos base datos
$query = "INSERT INTO `objetosusuarios` (`objetousuario`) VALUES ('$usuario');";

if ($conexion->query($query)) {
    echo "insercion efectuada";
    echo "filas afectadas " . $conexion->affected_rows;
} else {
    echo "error codigo:" . $conexion->errno . " mensaje error " . $conexion->error;
}

$conexion->close();


/*Si queremos volver a asarlo, lo traemos con un SELECT y lo deserializamos*/
$objetoSerializado = "dato tradio de  la tabla";
$objetoDeserializado = unserialize($objetoSerializado);
