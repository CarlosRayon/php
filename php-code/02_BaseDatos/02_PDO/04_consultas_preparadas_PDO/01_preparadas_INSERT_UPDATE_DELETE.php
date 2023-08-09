<?php
/*SENTENCIAS PREPARADAS CON PDO
 * -El funcionamiento de todas es igual solo cambiando la query
 *
 * -Pasos:
 *      - 1º Preparo la sentencia query
 *          -Cambiamos los valores que queramos bindear por :valor o por ?
 *      - 2º Preparo la consulta  RECUERDA!!! Devuelve un objeto tipo PDOstmt
 *      - 3º Bindeo los parametros
 *           -Si en paso 1º uso :valor bindeo: $PDOstmt->bindparam(":passusuario", $passUsuario);
 *           -Si en paso 1º uso ? bindeo: $PDOstmt->bindparam(1, $passUsuario);
 *      - 4º Establecemos los parametros
 *      - 5º Ejecutamos
 *
 *  RECUERDA!!! Todo ello en un try catch para capturas las exceptiones que lanza PDO
 *  RECUERDA!!! Podemos bindear directamente con array en execute()
 *
 *
 */

try {
    // 1º Preparo la sentencia
    $query = "INSERT INTO `usuarios` (`idusuario`, `nombreusuario`, `emailusuario`, `passusuario`) VALUES (NULL, :nombreusuario, 'afasf@2224', :passusuario)";


    $PDOstmt = $conexion->prepare($query); // 2º Preparo la consulta

    $PDOstmt->bindparam(":nombreusuario", $nombreUsuario); // 3º bindeo parametros
    $PDOstmt->bindparam(":passusuario", $passUsuario);

    /* Si en paso 1º uso ? lo hago de de esta manera
    $PDOstmt->bindparam(1, $nombreUsuario); // 3º bindeo parametros
    $PDOstmt->bindparam(2, $passUsuario);
    */

    $nombreUsuario = "lucas"; // 4ºenlazo valores
    $passUsuario = "nuevo password";

    $PDOstmt->execute(); // 5º ejecuto

    echo "Usuario actualizado, filas afectadas " . $PDOstmt->rowCount(); //RECUERDA!!! Podemos ver la filas afectadas por la sentencia

    $PDOstmt->closeCursor(); //Cerramos cursor
    $conexion = null; //Cerramos conexion

} catch (PDOException $exc) { //Capturo cualquier error

    echo "No se ha podido insertar usuario, error: " . $exc->getMessage();
    exit();
}


/*Sentencias preparadas bindeando con un array
    Los mismos pasos pero en vez usar bindParam le pasamos un array con los valores en execute
            -Dos opciones
 *              -Usar :valor en la sentencia
 *              -Usar  ? en la sentencia
  */
try {
    // Preparo la sentencia
    $query = "INSERT INTO `usuarios` (`idusuario`, `nombreusuario`, `emailusuario`, `passusuario`) VALUES (NULL, :nombreusuario, 'afasf@2224', :passusuario)";

    $PDOstmt = $conexion->prepare($query); // Preparo la consulta

    $nombreUsuario = "lucas"; // 4ºenlazo valores
    $passUsuario = "nuevo password";

    $PDOstmt->execute(array(':nombre' => $nombreUsuario, ':passusuario' => $passUsuario)); // ejecuto
    // $PDOstmt->execute(array($nombreUsuario,$passUsuario)); // Si en la sentencia pongo ? los parametros se los paso asi en el array

    echo "Usuario actualizado, filas afectadas " . $PDOstmt->rowCount(); //RECUERDA!!! Podemos ver la filas afectadas por la sentencia
    $conexion = null; //Cerramos conexion
} catch (PDOException $exc) { //Capturo cualquier error

    echo "No se ha podido insertar usuario, error: " . $exc->getMessage();

    exit();
}
