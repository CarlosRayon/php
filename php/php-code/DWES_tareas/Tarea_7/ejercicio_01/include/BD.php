<?php

/*
  Archivo que gestiona la base de datos y todas sus peticiones
 */

class BaseDatos
{
 
    protected static function conexion()
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

    public static function obtieneMatricula($contador)
    {
        $arrayConsulta = Array();
        $conexion = self::conexion();

        try {

            $query = "SELECT alumno, modulo FROM matricula, listamatricula WHERE matricula.contador=listamatricula.contador and matricula.contador=:contador";
            $PDOstmt = $conexion->prepare($query);
            $PDOstmt->bindParam(":contador", $contador);
            $contador = $contador;
            $PDOstmt->execute();

            /* Para capturar los datos */
            while ($filaArray = $PDOstmt->fetch(PDO::FETCH_ASSOC)) {//usamos el metodo fetch() de PDOstmt
                array_push($arrayConsulta, $filaArray); //guardamos los datos en un array
            }

            //Cierro la conexion
            $conexion = null;

            return $arrayConsulta;
        } catch (PDOException $exc) {
            die('Error: ' . $exc->getMessage());
        }
    }

    public static function anular($modulo, $contador)
    {

        try {

            $conexion = self::conexion();

            $conexion->beginTransaction();

            //La logica que he seguido seria:           
            //1º Borramos el modulo (esta sentencia no funciona)      
             $filasAfectadas=$conexion->exec("DELETE FROM `listamatricula` WHERE `listamatricula`.`contador` = " . $contador . " AND `listamatricula`.`modulo` = '" . $modulo . "'");
             
            //2º Compruebo que el alumno sigua teniendo modulos
            $tenemosModulos = BaseDatos::comprobarModulos($contador);

            //3º validamos los modulo. Si tenemos modulos no hacemos nada el alumno no tiene modulos pues le borramos
            if ($tenemosModulos === 0) {
                
                $conexion->exec("DELETE FROM `matricula` WHERE `matricula`.`contador` =" . trim($contador) . "");//trim para evitar un error de un espacio en la consulra
                
            } else {
                
                $tenemosModulos ="Tenemos Modulos";
            }

            $conexion->commit();

            return "Los parametros vemos que estan bien pasados \n el modulo es: " . $modulo . "\n el contador es:  " . $contador . "\n pero no afectamos a ninguna fila:  " . $filasAfectadas;
          
            $conexion = null;
            
        } catch (PDOException $ex) {

            $conexion->rollback();
            return "No se a podido hacer la sentencia, error: " . $ex->getMessage();
            exit();
        }
    }

    //Funcion para comprobar si el alumno tiene algun modulo asociado
    public static function comprobarModulos($contador)
    {
        $conexion = self::conexion();
        /* preparamos la consulta o la pasamos por parametros tambien */
        
        $query = "SELECT  COUNT(modulo) FROM `listamatricula` WHERE contador=$contador";
        try {

            $resultadoConsulta = $conexion->query($query); //Guardamos los datos de la consulta en una variable   
            // solo es un dato lo guardamos en una variable
            if (isset($resultadoConsulta)) {
                $row = $resultadoConsulta->fetch();
            }

            return $row;
        } catch (PDOException $ex) {
            die("Se ha produccido un error" . $ex->getMessage()); //Capturamos errores y matamos (die es un equivalente a exit())
        }
    }

}
