<?php

/*
Otra forma de trabaja con la conexion es hacer la conexion en una funcion static y protec para que solo la podamos usar en la propia clase
 */

class BaseDatos
{
    /* Atributos de la clase:
     * -Seran las propiedades que nos permitan conectar a la base de datos
     */

    /* En una funcion */
    protected static function conexion()
    {
        $servidor = "localhost";
        $usuario = "root";
        $pass = "";
        $baseDatos = "pruebas";
        try {
            $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cambiamos modo trabajar con las excepcion
            $conexion->exec("SET CHARACTER SET utf8"); //cambiamos la codificacion
            echo "conexion correcta";
            return $conexion;
        } catch (Exception $ex) {
            die("error" . $ex->getMessage());
        }
    }


    public static function alumnosMatriculados()
    {
        $conexion = self::conexion(); //LLamamos a la funcion conexion para usarla en las consultas
        $query = 'SELECT * FROM `matricula`';
    }
}
