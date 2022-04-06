<?php

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
class MisFunciones
{
    
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

    /**
     * Devuelve el nombre del modulo
     * 
     * @param  string $cod
     * @return string[]
     */
    public function saberNombre($cod)
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

    /**
     * Devuelve alumnos matriculados en un ciclo concreto
     * 
     * @param  string $codCiclo
     * @return string[]
     */
    public function matriculadosCiclo($codCiclo)
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

    /**
     * Devuelve el nombre y en cuantos modulos esta matriculado el  alumno
     * 
     * @return string[]
     */
    public function modulosCompletos()
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
