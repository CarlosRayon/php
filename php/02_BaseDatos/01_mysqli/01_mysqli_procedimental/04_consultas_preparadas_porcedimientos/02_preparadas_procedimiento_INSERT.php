<?php

/*
    Insertar valores con consulta preparada
 */

function consultaPreparadaProcedimientos()
{
    /*Lo primero como simpre nos conectamos a la base de datos*/
    $conexion = conectarBaseDatos();
    $query = "INSERT INTO `usuarios` (`idusuario`, `nombreusuario`, `emailusuario`, `passusuario`) VALUES (?,?,?,?)"; //REUERDA!!! Tantas ? como campos a introducir

    //Tantas variables como campos a insertar(se le pueden pasar por parametros a la funcion o sacar de un array o un objeto)
    $id = "5"; //Se la puedo pasar por parametro o un $_POST["nombre"] o lo que sea
    $nombre = "nuevo usuario"; //Se la puedo pasar por parametro o un $_POST["nombre"] o lo que sea
    $email = "dsdfas@fdfasf"; //Se la puedo pasar por parametro o un $_POST["nombre"] o lo que sea
    $pass = "nuevopass"; //Se la puedo pasar por parametro o un $_POST["nombre"] o lo que sea



    $stmt = mysqli_prepare($conexion, $query);

    //"s" string "i" numero "d" numero decimal
    $ok = mysqli_stmt_bind_param($stmt, "isss", $id, $nombre, $email, $pass); //Devuelve true o false RECUERDA!!! Solo pasar variables y mismo orden que la tabla

    $pk = mysqli_stmt_execute($stmt); //Devuelve true o false

    if ($ok == false) {
        echo "error al ejecutar la consulta";
        exit();
    } else {

        echo "Registro agregado<br>";
        mysqli_stmt_close($stmt);
    }
};
