<?php

/*
Con las transaciones podemos controlar los errores antes de ejecutar las consultas a la base de datos
Podemos insertar actualizar borrar
    -Constan de:
        -Ponemos el autocommit en false
 *      -Iniciamos la transaccion
 *      -Si ha salido bien hacemos un commit para confirma la transacion
 *      -Si tenemos algun error hacemos un rollback
 */

function transacionSimple($query) //podemos crear la consulta dentro de la funcion(Puede ser insert,Update,delete..)
{

    $conexion = conectarBaseDatos();
    $conexion->set_charset("utf8"); //definimos la codificacion
    $conexion->autocommit(false); //Desabilitamos la autoconfirmacion(autocometer) de las consulta
    $conexion->begin_transaction(MYSQLI_TRANS_START_READ_ONLY); //Dara error mejor con este: MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT  ?¿

    if ($consulta = $conexion->query($query)) { //si la consulta esta bien

        if ($conexion->commit()) //Validamos si el commmit(cometer) se ha efectuado bien
        {
            echo "Datos guardados";
        } else {
            echo "no se han podido guardar los datos";
        }
    } else {
        $conexion->rollback(); //Si no sale bien la transacion la anulamos(retrocedemos)
        echo "datos no guardados";
    }

    $conexion->close(); //Opcional
    return $consulta;
};

/*Otra transaccion Simple*/

function sql($query)
{
    //podemos crear la consulta dentro de la funcion(Puede ser insert,Update,delete..)
    $conexion = conectarBaseDatos();
    $conexion->autocommit(false);
    $conexion->begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
    if (!$con = $conexion->query($query)) {
        echo 'Error de sintaxis en la consulta solicitada';
        $conexion->rollback();
    } else {
        $conexion->commit();
    }

    $conexion->close();
    return $con; //Si se ha efectuado correctamente devolvera un valor de 1 (true)
}
