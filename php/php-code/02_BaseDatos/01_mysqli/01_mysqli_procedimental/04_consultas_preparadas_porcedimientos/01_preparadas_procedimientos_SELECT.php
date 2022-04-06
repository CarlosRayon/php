<?php

/*
    Consultas preparadas enfocadas a objetos
 * Evitan inyeccion SQL
 * Consulta tipo INSERT son mas rapidas y eficientes
 *
 *
 * Paso:
 *  -Crear query cambiando los valores del criterio por el simbolo ?
 *      $query="SELECT * FROM USUARIOS WHERE NOMBREUSUARIO = ?";
 *
 *  -Prepararamo la consulta
 *      $stmt=mysqli_prepare($conexion, $query);
 *
 *  -Unimos los parametros a la query con mysqli_stmt_bind_param()
 *
 *    mysqli_stmt_bind_param($stmt, $query, $stmt)
 *
 *      -requiere tres parametros:
 *          -El objeto stmt devuelto por el prepare
 *          -Tipo de dato de los valores de criterio
 *          -Valores de criterio
 *
 *  -Ejecutamos la consulta:
 *      -mysqli_stmt_execute($stmt);//Pasandole el objeto $stmt devuelve true o false
 *
 *  -Asociamos variables al resultado de la consulta con mysqli_stmt_bind_result()
 *      mysqli_stmt_bind_result($stmt,$variable, $variable2, $variable3);
 *          -Requiere:
 *               -El objeto stmt devuelto por el prepare
 *              -Tantas variables como capos devueltos por la consulta
 *
 *  -Recorremos los valores devueltos con la funcion  mysqli_stmt_fetch();
 *      mysqli_stmt_fetch($stmt); Pide como parametro El objeto stmt devuelto por el prepare
 *
 */


/*PROCEDIMIENTOS RESUMENT
$stmt=mysqli_prepare($conexion, $query);
mysqli_stmt_bind_param($stmt, "s", $stmt);//"s" string "i" numero "d" numero decimal
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $idusuario,$nombreUsuario,$emailUsuario,$passUsuarios);
mysqli_stmt_fetch($stmt);
 */

function consultaPreparadaProcedimientos()
{
    /*Lo primero como simpre nos conectamos a la base de datos*/
    $conexion = conectarBaseDatos();
    //$query="INSERT INTO `usuarios` (`idusuario`, `nombreusuario`, `emailusuario`, `passusuario`) VALUES ('5', 'preuba', 'dfsfasfd', 'fdsfsdfas')";
    $query = "SELECT * FROM `usuarios` WHERE nombreusuario = ?";

    $variablePasar = "carlos"; //Se la puedo pasar por parametro o un $_POST["nombre"] o lo que sea

    /*PROCEDIMIENTOS*/
    $stmt = mysqli_prepare($conexion, $query);

    //"s" string "i" numero "d" numero decimal
    $ok = mysqli_stmt_bind_param($stmt, "s", $variablePasar); //Devuelve true o false RECUERDA!!! Solo pasar variables

    $pk = mysqli_stmt_execute($stmt); //Devuelve true o false

    if ($ok == false) {
        echo "error al ejecutar la consulta";
        exit();
    } else {

        $ok = mysqli_stmt_bind_result($stmt, $idusuario, $nombreUsuario, $emailUsuario, $passUsuarios); //devuelve true o false

        echo "usuarios econtrados <br>";

        while (mysqli_stmt_fetch($stmt)) {
            echo $idusuario . " " . $nombreUsuario . " " . $emailUsuario . " " . $passUsuarios;
        }

        mysqli_stmt_close($stmt);
    }
};
