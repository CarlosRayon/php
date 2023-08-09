<?php

/*
  Lo primero creo una clase con funciones que son las que pondre a disposicion de los usuarios
 * -RECUERDA!!!Las funciones a disposion deben ser publicas
 * -RECUERDA!!!Comentar estrictamente las funciones para luego crear el wdls correctamente
 * Entre los tipos usaremos:
    *  int para entero
    *  float para decimal
    *  string para caracter
    *  string[] para un array o registro
 */

/**
 * Clase MisFunciones
 *
 * Desarrollo Web en Entorno Servidor
 * Tema 6: Servicios web
 * Ejemplo: Documentación para generación
 *          automática del documento WSDL
 *
 * @author Carlos Rayon
 */
class Funciones
{

    protected static function conexion()
    {
        $servidor = "localhost";
        $usuario = "root";
        $pass = "";
        $baseDatos = "prueba";
        try {
            $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");
            echo "conexion correcta";
            return $conexion;
        } catch (Exception $ex) {
            die("error" . $ex->getMessage());
        }
    }

    /**
     * Devuelve un string
     *
     * @param  string $a
     * @param  string $b
     * @return string
     */

    public function holaMundo($a, $b)
    {
        return "Hola Mundo " . $a + $b;
    }

    /**
     * Devuelve un entero
     *
     * @param  int $a
     * @return int
     */

    public function adiosMundo($a)
    {
        return $a;
    }
}
