<?php
/*
Podemos combinar transacciones con consultas preparadas
 * Pasos:
 *  -1º Preparamos la sentencia
 *  -2º Comenzamos la transaccion
 *  -3º Preparamos la primera sentencia
 *  -4º Preparamos los valores para enlazar a la sentencia
 *  -5º Ejecuto
 *      REPITO PASOS 3º, 4º, 5º, por cada sentencia que tengamos
 *  -6º Confirmamos cambios commit() o los revertimos rollBack()
 */

try { //RECUERDA SI NO FUNCIONA ASI USAR METODO DE LOS ?

    // 1º Preparo la sentencia/as
    $queryInsert = "INSERT INTO `usuarios` (`idusuario`, `nombreusuario`, `emailusuario`, `passusuario`) VALUES (NULL, ?, 'afasf@2224', ?)";
    $queryDelete = "DELETE FROM `usuarios` WHERE `usuarios`.`idusuario` = ?";

    $conexion->beginTransaction(); //2º Comenzamos la transaccion

    $PDOstmt = $conexion->prepare($queryInsert); // 3º Preparo la sentencia primera

    $nombreUsuario = "nanaki"; //4º Preparo los valores que enlazare con la sentencia
    $passUsuario = "final fantasy 7";

    $PDOstmt->execute(array($nombreUsuario, $passUsuario)); // 5º ejecuto
    // $PDOstmt->execute(array($nombreUsuario, $passUsuario)); La puedo ejecutar las veces que quiera

    //Repito los puntos 3º, 4º y 5º...

    $PDOstmt = $conexion->prepare($queryDelete);

    $idusuario = 13;

    $PDOstmt->execute(array($idusuario));

    //...Tantas sentencias como tengamos

    $conexion->commit(); //6º confirmo cambios...

    echo "Usuario actualizado";
    $PDOstmt->closeCursor(); //Cerramos cursor
    $conexion = null;
} catch (PDOException $exc) { //Capturo cualquier error

    $conexion->rollback(); //... o los revierto si hemos capturado algun error

    echo "No se ha podido insertar usuario, error: " . $exc->getMessage();

    exit();
}
