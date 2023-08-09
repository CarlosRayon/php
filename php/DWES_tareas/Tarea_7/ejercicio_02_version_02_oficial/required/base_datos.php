<?php

/*
  Archivo con la logica de interracion de con la base datos
 */

class BaseDatos
{

    protected static function conexionBaseDatos()
    {

        $servidor = "localhost";
        $usuario = "dwes";
        $pass = "abc123.";
        $baseDatos = "agl";

        try {

            $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cambiamos modo trabajar con las excepcion
            $conexion->exec("SET CHARACTER SET utf8"); //cambiamos la codificacion
            return $conexion;
        } catch (Exception $ex) {
            die("error" . $ex->getMessage());
        }
    }

    /* Funcion para obtener los codigos de los modulos de la base de datos */

    public static function obtenerCodigo()
    {

        $conexion = self::conexionBaseDatos();
        $query = "SELECT cod FROM `modulo`";
        $arrayConsulta = Array();
        try {

            $resultadoConsulta = $conexion->query($query);

            while ($fila = $resultadoConsulta->fetch(PDO::FETCH_ASSOC)) {
                array_push($arrayConsulta, $fila);
            }

            return $arrayConsulta;
        } catch (Exception $ex) {
            die("Se ha produccido un error" . $ex->getMessage()); //Capturamos errores y matamos (die es un equivalente a exit())
        }
    }

    public static function maximoHoras()
    {
        $conexion = self::conexionBaseDatos();
        $query = "SELECT MAX(horas) FROM `modulo`";
        try {

            $resultadoConsulta = $conexion->query($query);
            // solo es un dato lo guardamos en una variable
            if (isset($resultadoConsulta)) {
                $row = $resultadoConsulta->fetch(PDO::FETCH_UNIQUE);
            }
            return $row;
        } catch (Exception $ex) {
            die("Se ha produccido un error" . $ex->getMessage()); //Capturamos errores y matamos (die es un equivalente a exit())
        }
    }

    public static function verModulosCiclo($ciclo)
    {
        $conexion = self::conexionBaseDatos();
        // $query = "SELECT ciclo, nombre FROM modulo WHERE ciclo = '" . $ciclo . "'";
        $query = "SELECT ciclo.cod, modulo.nombre FROM ciclo, modulo WHERE ciclo.cod=modulo.ciclo AND ciclo.cod='" . $ciclo . "'";
        $arrayConsulta = Array();
        try {

            $resultadoConsulta = $conexion->query($query);

            while ($fila = $resultadoConsulta->fetch(PDO::FETCH_ASSOC)) {
                array_push($arrayConsulta, $fila);
            }

            return $arrayConsulta;
        } catch (Exception $ex) {
            die("Se ha produccido un error" . $ex->getMessage()); //Capturamos errores y matamos (die es un equivalente a exit())
        }
    }

    public static function existeCiclo()
    {
        
        $conexion = self::conexionBaseDatos();
        $query = "SELECT * FROM `ciclo`"; // $sql= select….   FROM …  WHERE cod=$cod
        $arrayConsulta = Array();
        try {

            $resultadoConsulta = $conexion->query($query);

            while ($fila = $resultadoConsulta->fetch(PDO::FETCH_ASSOC)) {
                array_push($arrayConsulta, $fila);
            }

            return $arrayConsulta;
        } catch (Exception $ex) {
            die("Se ha produccido un error" . $ex->getMessage()); //Capturamos errores y matamos (die es un equivalente a exit())
        }
    }
    
    public static function insertarModulo($modulo)
    {
        $conexion = self::conexionBaseDatos(); //Establecemos conexion

        try {
            //Creo las sentencias
            $query = "INSERT INTO `modulo` (`cod`, `nombre`, `horas`, `curso`, `plazas`, `ciclo`) VALUES (?, ?, ?, ?, ?, ?)";
                     
            //Preparo la 1º sentencia
            $PDOstmt = $conexion->prepare($query);

            //Doy valor la las variables que estan enlazadas a la sentencia
            $cod = $modulo->getCod();
            $nombre = $modulo->getNombre();
            $horas = $modulo->getHoras();
            $curso = $modulo->getCurso();
            $plazas = $modulo->getPlazas();        
            $ciclo = $modulo->getCiclo();
            //ejecuto la sentencia
            $PDOstmt->execute(array($cod, $nombre, $horas, $curso, $plazas, $ciclo));
                          
            //Cierro la conexion
            $conexion = null;
            
            return true;
            
        } catch (Exception $exc) {

            //Si tenemos algun error            
            $conexion->rollBack();

            echo "Se ha produccido un error en la excepcion, Error: " . $exc->getMessage();

            exit();
        }
    }

}
