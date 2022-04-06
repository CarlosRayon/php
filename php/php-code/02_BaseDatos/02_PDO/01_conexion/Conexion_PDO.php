<?php

/*
  Archivo PHP que nos servira para establecer la conexion a la base de datos
 * -RECUERDA!!! Con PDO trabajamos con trycath
 */
//Variables para la conexion
$host = "localhost";
$nombreBaseDatos = "pruebas";
$password = "";
$usuario = "root";

try { //Al trabajar con objetos podemos capturar sus excepciones

    /*Para que el servidor utilize codificacion UTF-8 (OPCIONAL)RECUERDA!!! De esta forma incluir la variable como 4 parametro en constructor
             $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

      -Lo puedo hace despues de establecer la conexion con:
                $conexion->exec("SET CHARACTER SET utf8");

    */
    $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //OBLIGATORIO!!!Cambiamos modo trabajar con las excepcion

    echo "conexion correcta";
} catch (PDOException $ex) {

    die("error" . $ex->getMessage());
}



/*En una funcion*/
function conexion()
{
    //Variables para la conexion
    $host = "localhost";
    $nombreBaseDatos = "pruebas";
    $password = "";
    $usuario = "root";

    try { //Al trabajar con objetos podemos capturar sus excepciones

        $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDatos", $usuario, $password);
        $conexion->exec("SET CHARACTER SET utf8");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //OBLIGATORIOCambiamos modo trabajar con las excepcion
        echo "conexion correcta";
        return $conexion;
    } catch (PDOException $ex) {
        die("error" . $ex->getMessage());
    }
};


/*otra forma de hace la conexion*/
function conexion2()
{
    try {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=dwes";
        $usuario = 'dwes';
        $contrasena = 'abc123.';

        $conexion = new PDO($dsn, $usuario, $contrasena, $opc);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cambiamos modo trabajar con las excepcion
        return $conexion;
    } catch (PDOException $ex) {
        die("error" . $ex->getMessage());
    }
}
