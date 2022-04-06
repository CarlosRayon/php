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
    $conexion = conectarBaseDatos(); //Nos conectamos primero

    mysqli_set_charset($conexion, "utf8"); //definimos la codificacion
    mysqli_autocommit($conexion, false); //Desabilitamos la autoconfirmacion(autocometer) de las consulta

    mysqli_begin_transaction($conexion, MYSQLI_TRANS_START_READ_ONLY); //Este no da error:  MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT  ?¿


    if ($consulta = mysqli_query($conexion, $query)) { //si la consulta esta bien

        if (mysqli_commit($conexion)) //Validamos si el commmit(cometer) se ha efectuado bien
        {
            echo "Datos guardados";
        } else {
            echo "no se han podido guardar los datos";
        }
    } else {
        mysqli_rollback($conexion); //Si no sale bien la transacion la anulamos(retrocedemos)

        echo "datos no guardados";
    }
    mysqli_close($conexion); //Opcional

    return $consulta;
};

/*Otra transaccion Simple*/


function transicionSimple2($query)
{
    //podemos crear la consulta dentro de la funcion(Puede ser insert,Update,delete..)

    $conexion = conectarBaseDatos(); //Nos conectamos primero

    mysqli_set_charset($conexion, "utf8"); //definimos la codificacion
    mysqli_autocommit($conexion, false); //Desabilitamos la autoconfirmacion(autocometer) de las consulta
    mysqli_begin_transaction($conexion, MYSQLI_TRANS_START_READ_ONLY); //Este no da error:  MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT  ?¿

    if (!$con = mysqli_query($conexion, $query)) {
        echo 'Error de sintaxis en la consulta solicitada';
        mysqli_rollback($conexion);
    } else {
        mysqli_commit($conexion);
    }

    mysqli_close($conexion);
    return $con; //Si se ha efectuado correctamente devolvera un valor de 1 (true)
}
