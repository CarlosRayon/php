<?php
/*
   TRANSACIONES PDO
        Pasos:
 *          -1º Comenzamos la transaccion con beginTransaction() (ponemos el autocommit en false
 *          -2º Ejecutamos las sentencias que queramos con exec(<sentencia>)
 *          -3º Ejecutamos el commit() para confirmar las sentencias o hacemos rollBack() en el catch para revertir los cambios si hay algun error
 */

try {

    $conexion->beginTransaction(); //1º Iniciamos transaccion
    //
    //2º ejecuatamos las sentencias  RECUERDA!!! exec devuelve el numero de filas afectadas asi podemos saber las filas afectadas
    $filaAfectadas = $conexion->exec("INSERT INTO `usuarios` (`idusuario`, `nombreusuario`, `emailusuario`, `passusuario`) VALUES (NULL, 'transaccion 1', 'afasf@2224', 'duul')");
    $conexion->exec("INSERT INTO `usuarios` (`idusuario`, `nombreusuario`, `emailusuario`, `passusuario`) VALUES (NULL, 'transaccion 2', 'afasf@2224', 'dul dul')");
    $conexion->exec("DELETE FROM `usuarios` WHERE `usuarios`.`idusuario` = 30");
    $conexion->exec("DELETE FROM `usuarios` WHERE `usuarios`.`idusuario` = 31");
    $conexion->exec("DELETE FROM `usuarios` WHERE `usuarios`.`idusuario` = 32");

    $conexion->commit(); // 3º Confirmamos cambios o...

    echo "Cambio produccidos con exito" . $filaAfectadas;

    $conexion = null;
} catch (PDOException $ex) {
    $conexion->rollback(); //3º...revertimos las sentencias

    echo "No se a podido hacer la sentencia, error: " . $ex->getMessage();
    exit();
}
