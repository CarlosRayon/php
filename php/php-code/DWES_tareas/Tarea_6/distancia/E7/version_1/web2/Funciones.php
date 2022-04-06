<?php

/*
  Clase con funciones que pondremos a disposicion del servicio web */

class MisFunciones
{
    
    /* Funcion que me establece la conexion */

    protected static function conexion()
    {
        $servidor = "localhost";
        $usuario = "dwes";
        $pass = "abc123.";
        $baseDatos = "agl";
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

    /* Funcion que devuelve el nombre del modulo que tenga el codigo pasado por parametros */

    public static function saberNombre($cod)
    {
        try {
            $conexion = self::conexion();
            $query = "SELECT nombre FROM modulo WHERE cod = :cod";
            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(':cod', $codigo);
            $codigo = $cod;
            $pdostmt->execute();

            $row = $pdostmt->fetch(PDO::FETCH_UNIQUE);

            return$row;
            
        } catch (Exception $exc) {

            die('Error: ' . $exc->getMessage());
        }
    }

    /* Funcion que devuelve un array con los alumnos matriculados en el ciclo que le pasemos por parametro */
    public static function matriculadosCiclo($codCiclo)
    {
        try {
            $conexion = self::conexion();

            $query = "select DISTINCT alumno from matricula, listamatricula, modulo, ciclo"
                    . " where matricula.contador=listamatricula.contador and listamatricula.modulo=modulo.cod"
                    . " and modulo.ciclo=:codCiclo";

            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(':codCiclo', $codigo);
            $codigo = $codCiclo;
            $pdostmt->execute();
            $arrayConsulta = Array();
            /* Para capturar los datos */
            while ($filaArray = $pdostmt->fetch()) {
                array_push($arrayConsulta, $filaArray); 
            }

            return $arrayConsulta;
        } catch (Exception $exc) {

            die('Error: ' . $exc->getMessage());
        }
    }

    /* Funcion que devuelve un array con los nombres de los alumno matriculados
      y el numero de modulos en los que estan matriculados */

    public static function modulosCompletos()
    {

        try {
            $conexion = self::conexion();

            $query = "SELECT alumno, COUNT(modulo) AS numeromodulos"
                    . " FROM matricula, listamatricula WHERE matricula.contador=listamatricula.contador"
                    . " GROUP BY alumno";

            $pdostmt = $conexion->prepare($query);
            $pdostmt->execute();
            $arrayConsulta = Array();
            /* Para capturar los datos */
            while ($filaArray = $pdostmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($arrayConsulta, $filaArray); 
            }
            
            return $arrayConsulta;
        } catch (Exception $exc) {
            die('Error: ' . $exc->getMessage());
        }
    }

}
