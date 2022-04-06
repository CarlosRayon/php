<?php

//RECUERDA!!! Si el valor es autoincrementable no hace falta ponerle
function insertPreparadaObjetos()
{

    //RECUERDA!!! MYSQLI solo permite bindear valores por tipo ?

    /*Lo primero como simpre nos conectamos a la base de datos*/
    $conexion = conectarBaseDatos();
    $query = "INSERT INTO `usuarios` (`idusuario`, `nombreusuario`, `emailusuario`, `passusuario`) VALUES (?,?,?,?)"; //RECUERDA!!! Tantas ? como campos a introducir

    $stmt = $conexion->prepare($query);

    //"s" string "i" numero "d" numero decimal
    $ok = $stmt->bind_param("isss", $id, $nombre, $email, $pass); //Devuelve true o false RECUERDA!!! Solo pasar variables y mismo orden que la tabla
    //
    //Tantas variables como campos a insertar(se le pueden pasar por parametros a la funcion o sacar de un array o un objeto)
    $id = "5"; //Se la puedo pasar por parametro o un $_POST["nombre"] o lo que sea
    $nombre = "nuevo usuario";
    $email = "dsdfas@fdfasf";
    $pass = "nuevopass";

    $pk = $stmt->execute(); //Devuelve true o false

    if ($ok == false) {

        echo "error al ejecutar la consulta";
        exit();
    } else {

        echo "Registro agregado<br>";
        $stmt->close();
    }
};
