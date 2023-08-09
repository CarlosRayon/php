<?php
/*
  clase de la base de datos
 */
class BaseDatos
{
    /* Atributos de la clase:
     * -Seran las propiedades que nos permitan conectar a la base de datos
     */
    /* Funcion para establecer la conexion: Por PDO */
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

    /* Metodo para obtener todos los modulos de la base de datos (consulta preparada) */

    public static function listaModulos()
    {
        $conexion = self::conexion(); //Establecemos conexion  
        $arrayConsulta = Array(); //Array donde guardar los datos

        try {
            $query = "SELECT * FROM modulo "; //Creamos la query
            $stmt = $conexion->prepare($query); //Preparo la consulta.  
            $stmt->execute(); //La ejecuto

            while ($filaArray = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $modulo = new Modulo($filaArray['cod'], $filaArray['nombre'], $filaArray['horas'], $filaArray['horas'], $filaArray['plazas'], $filaArray['ciclo']);
                array_push($arrayConsulta, $modulo);
            }
            //Y devuelvo el array para trabajar con el
            return $arrayConsulta;
        } catch (Exception $ex) {
            die("Se ha produccido un error" . $ex->getMessage()); //Capturamos errores y matamos (die es un equivalente a exit())
        }
    }

    /* metodo que inserta el modulo comun creado en al base de datos(transacion con sentencias preparadas)
     * -Inserta los datos parte del los datos en la tabla modulo y los otros en la tabla comun
     * -Combino transaccion por ser mas de una sentencia y consulta preparada por recibir datos del exterior(evito inyecion)
     * @arguments {objeto} Objeto tipo Comun con los datos del modulo comun
     */

    public static function insertarModuloComun($moduloComun)
    {
        $conexion = self::conexion(); //Establecemos conexion

        try {
            //Creo las sentencias
            $queryInsertTablaModulo = "INSERT INTO `modulo` (`cod`, `nombre`, `horas`, `curso`, `plazas`, `ciclo`) VALUES (?, ?, ?, ?, ?, ?)";
            $queryInsertTablaComun = "INSERT INTO `comun` (`codigo`, `departamento`) VALUES (?, ?)";

            //Inicio la transaccion      
            $conexion->beginTransaction();

            //Preparo la 1º sentencia
            $PDOstmt = $conexion->prepare($queryInsertTablaModulo);

            //Doy valor la las variables que estan enlazadas a la sentencia
            $cod = $moduloComun->getCod();
            $nombre = $moduloComun->getNombre();
            $horas = $moduloComun->getHoras();
            $curso = $moduloComun->getCurso();
            $plazas = $moduloComun->getPlazas();
            $ciclo = $moduloComun->getCiclo();

            //ejecuto la sentencia
            $PDOstmt->execute(array($cod, $nombre, $horas, $curso, $plazas, $ciclo));

            //Repito los pasos para la siguiente sentencia

            $PDOstmt = $conexion->prepare($queryInsertTablaComun); //Preparo
            //Doy valor a las variables enlazadas
            $codigo = $moduloComun->getCod();
            $departamento = $moduloComun->getDepartamento();

            //Ejecuto la sentencia
            $PDOstmt->execute(array($codigo, $departamento));

            //Comfirmo la sentencia si todo ha ido bien
            $conexion->commit();

            //echo "correctoTodo. Fila afectadas " . $PDOstmt->rowCount();
            //Cerramos  el cursors (Valida esta opcion?¿???)
            $PDOstmt->closeCursor();
            //Cierro la conexion
            $conexion = null;
        } catch (Exception $exc) {

            //Si tenemos algun error            
            $conexion->rollBack();

            echo "Se ha produccido un error en la excepcion, Error: " . $exc->getMessage();

            exit();
        }
    }

    /* Metodo que saca el ciclo del modulo eleguido en maestra.php(consultas preparadas) */

    public static function verModuloComun($cod)
    {
        $conexion = self::conexion(); //Establecemos conexion
        try {
            $arrayConsulta = Array();
            $query = "SELECT * FROM `modulo` WHERE `cod` = :cod"; //Creo sentencia
            $PDOstmt = $conexion->prepare($query); //Preparo sentencia
            $PDOstmt->bindParam(':cod', $codigo); //Enlazo valores
            $codigo = $cod; //Doy valores a la variable de enlaze
            $PDOstmt->execute(); //ejecuto

            /* Para capturar los datos de la matricula y los paso a un array */
            while ($filaArray = $PDOstmt->fetch()) {//Devuelvo como array asociativo
                array_push($arrayConsulta, $filaArray); //guardamos los datos en un array
            }

            $query = "SELECT departamento FROM comun WHERE `codigo` = :cod"; //Creo sentencia
            $PDOstmt = $conexion->prepare($query); //Preparo sentencia
            $PDOstmt->bindParam(':cod', $codigo); //Enlazo valores
            $codigo = $arrayConsulta[0]['cod']; //Doy valores a la variable de enlaze
            $PDOstmt->execute(); //ejecuto

            /* Añado el dato de esta consulta al array con los otros datos */
            $filaArray = $PDOstmt->fetch();
            array_push($arrayConsulta, $filaArray);

            return $arrayConsulta; //Devuelvo el array
        } catch (Exception $ex) {

            echo "Se ha produccido un error en la excepcion, Error: " . $ex->getMessage();
            exit();
        }
    }

    /* Metodo para obtener los datos de la matricula(consultas preparadas)
      -saco alumnos donde el contador coincida en matricula y listaMatricula
     */
    public static function alumnosMatriculados($codigo)
    {
        $conexion = self::conexion();
        $arrayConsulta = Array();
        try {
            $query = "select alumno,sexo,nacimiento,DNI,fichero from matricula, listamatricula where matricula.contador=listamatricula.contador and listamatricula.modulo=:cod";
            //Hago la consulta preparada
            $PDOstmt = $conexion->prepare($query);
            $PDOstmt->bindParam(':cod', $codigo);
            $codigo = $codigo;
            $PDOstmt->execute();

            /* Para capturar los datos de la matricula y los paso a un array */
            while ($filaArray = $PDOstmt->fetch(PDO::FETCH_ASSOC)) {//Devuelvo como array asociativo
                $alumno= new Alumno($filaArray['alumno'], $filaArray['DNI'], $filaArray['sexo'], $filaArray['nacimiento'], $filaArray['fichero']);
                array_push($arrayConsulta, $alumno); //guardamos los datos en un array
            }

            return $arrayConsulta; //Devuelvo el array
        } catch (Exception $ex) {

            die("Se ha produccido un error " . $ex->getMessage()); //Capturamos errores y matamos (die es un equivalente a exit())
        }
    }

    /* Metodo para actualizar los datos de los modulos comunes (transaccion con sentencias preparadas) */
    public static function actualizarModuloComun($cod)
    {

        $conexion = self::conexion(); //Establecemos conexion

        try {
            //Creo las sentencias
            $queryUpdateModulo = "UPDATE `modulo` SET `nombre` = ?, `horas` = ?, `curso` = ?, `plazas` = ? WHERE `modulo`.`cod` = ?";
            $queryUpdateComun = "UPDATE `comun` SET `departamento` = ? WHERE `comun`.`codigo` = ?";

            //Inicio la transaccion      
            $conexion->beginTransaction();

            //Preparo la 1º sentencia
            $PDOstmt = $conexion->prepare($queryUpdateModulo);

            //Doy valor la las variables que estan enlazadas a la sentencia
            $cod = $cod;
            $nombre = $_GET["nombre"];
            $horas = $_GET["horas"];
            $curso = $_GET["curso"];
            $plazas = $_GET["plazas"];

            //ejecuto la sentencia
            $PDOstmt->execute(array($nombre, $horas, $curso, $plazas, $cod));

            //Repito los pasos para la siguiente sentencia
            $PDOstmt = $conexion->prepare($queryUpdateComun); //Preparo
            //Doy valor a las variables enlazadas
            $codigo = $cod;
            $departamento = $_GET["departamento"];

            //Ejecuto la sentencia
            $PDOstmt->execute(array($departamento, $codigo));

            //Comfirmo las sentencia si todo ha ido bien
            $conexion->commit();

            //Cerramos  el cursor
            $PDOstmt->closeCursor();

            //Cierro la conexion
            $conexion = null;
        } catch (Exception $exc) {
            //Si tenemos algun error            
            $conexion->rollBack();
            echo "Se ha produccido un error en la excepcion, Error: " . $exc->getMessage();
            exit();
        }
    }

}
