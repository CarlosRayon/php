<?php

/*
  Consultas preparadas enfocadas a objetos
 * Evitan inyeccion SQL
 * Consulta tipo INSERT son mas rapidas y eficientes
 *
 * Paso:
 *  -Crear query cambiando los valores del criterio por el simbolo ?
 *      $query="SELECT * FROM USUARIOS WHERE NOMBREUSUARIO = ?";
 *
 *  -Prepararamo la consulta
 *      $stmt=$conexion->prepare($query); devuelve objeto Mysqli_stmt
 *
 *  -Unimos los parametros a la query con mysqli_stmt_bind_param()
 *
 *      $stmt->bind_param(<tipodato>, <valorCriterio>);//Devuelve true o false
 *
 *          -requiere dos parametros:
 *          -Tipo de dato de los valores de criterio
 *          -Valores de criterio
 *
 *  -Ejecutamos la consulta:
 *      $stmt->execute(); //Devuelve true o false
 *
 * -Asociamos variables al resultado de la consulta con:

 *  $stmt->bind_result($varibale1,$variable2,$variable3);Tantas variables como capos devueltos por la consulta
 *
 * -Recorremos los valores devueltos con la funcion  mysqli_stmt_fetch();
 *      $stmt->fetch();
 *
 *
 RESUMEN DE LOS PASOS
$stmt=$conexion->prepare($query);
$stmt->bind_param($query, $stmt);
$stmt->execute();
$stmt->bind_result($idusuario,$nombreUsuario,$emailUsuario,$passUsuarios);
$stmt->fetch();
 *
 */

function consultaPreparadaObjetos()
{
    /*Lo primero como simpre nos conectamos a la base de datos*/
    $conexion = conectarBaseDatos();

    $query = "SELECT * FROM `usuarios` WHERE nombreusuario = ?";

    $variablePasar = "carlos"; //Se la puedo pasar por parametro o un $_POST["nombre"] o lo que sea


    $stmt = $conexion->prepare($conexion, $query);

    //"s" string "i" numero "d" numero decimal
    $ok = $stmt->bind_param("s", $variablePasar); //Devuelve true o false RECUERDA!!! Solo pasar variables

    $pk = $stmt->execute(); //Devuelve true o false

    if ($ok == false) {
        echo "error al ejecutar la consulta";
        exit();
    } else {

        $ok = $stmt->bind_result($idusuario, $nombreUsuario, $emailUsuario, $passUsuarios); //devuelve true o false

        echo "usuarios econtrados <br>";

        while ($stmt->fetch()) {
            echo $idusuario . " " . $nombreUsuario . " " . $emailUsuario . " " . $passUsuarios;
        }

        $stmt->close();
    }
}
