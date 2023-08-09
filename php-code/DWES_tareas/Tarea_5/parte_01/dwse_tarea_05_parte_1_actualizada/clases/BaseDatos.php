<?php

/*
  Clase de la base de datos
 */

class BaseDatos
{
    /* Atributos de la clase:
     * -Seran las propiedades que nos permitan conectar a la base de datos
     */

    private $servidor = "localhost";
    private $usuario = "dwes";
    private $pass = "abc123";
    private $baseDatos = "agl";
    private $listadoCiclos = array();
    private $listadoModulos = array();

    /* Metodos getter y setter no necesarios en este caso ya que siempre nos conectamos con el mismo usuario a la misma base datos */

    /* Metodos de la clase:
     * -No permitiran el menejo de la base de datos
     */

    /* Funcion conexion:
     *  -No conecta a la base de datos
     *  @return {Object} Devuelve un objeto con la conexion a la base datos
     */

    public function conexion()
    {
        try {

            $conexion = new PDO("mysql:host=$this->servidor;dbname=$this->baseDatos", $this->usuario, $this->pass);
            $conexion->exec("SET CHARACTER SET utf8");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //OBLIGATORIOCambiamos modo trabajar con las excepcion

            return $conexion;
        } catch (Exception $ex) {
            die("error" . $ex->getMessage());
        }
    }

    /* Metodo verCiclos:
     *  -No permiter obtener los ciclos de la tabla ciclo de la base datos
     *  @return {Array} Retorna con un array con los ciclos
     */

    public function verCiclos()
    {

        $conexion = $this->conexion();
        $query = "SELECT * FROM `ciclo`";
        try {
            $resultadoConsulta = $conexion->query($query);
            if (isset($resultadoConsulta)) {
                while ($filaArray = $resultadoConsulta->fetch()) {
                    array_push($this->listadoCiclos, $filaArray);
                }
            }

            return $this->listadoCiclos;
        } catch (Exception $ex) {
            die("Se ha produccido un error" . $ex->getMessage());
        }
    }

    /* Metodo verModulos:
     * -No permite obtener todos los modulos de un ciclo
     * @argument {String} String con el nombre del ciclo del cual quiero obtener los modulos
     * @return {Array} Un array de los moudulos
     */

    public function obtenerModulos($ciclo)
    {
        $conexion = $this->conexion();
        try {
            $query = "SELECT * FROM modulo WHERE ciclo = :ciclo AND plazas>0";
            $PDOstmt = $conexion->prepare($query);
            $PDOstmt->bindParam(":ciclo", $ciclo);
            $PDOstmt->execute();

            while ($filaArray = $PDOstmt->fetch()) {//usamos el metodo fetch() de PDOstmt
                array_push($this->listadoModulos, $filaArray); //guardamos los datos en un array
            }
            return $this->listadoModulos;
            $conexion = null;
        } catch (Exception $ex) {

            die("Se ha produccido un error" . $ex->getMessage());
        }
    }

    /* Metodo insertarAlumno 
     * -Metodo para insertar los datos de alumno dentro de la tabla matricula (consulta preparada)
     */

    public function insertarAlumno()
    {

        /* Lo primero como simpre nos conectamos a la base de datos */
        $conexion = $this->conexion();
        try {

            $queryInsert = "INSERT INTO `matricula` (`alumno`, `sexo`, `nacimiento`, `DNI`, `fichero`) VALUES (?,?,?,?,?)";
            $queryUpdate = "UPDATE `modulo` SET `plazas`=plazas -1 WHERE cod=:cod";

            $conexion->beginTransaction();

            //Insertamos el alumno
            $PDOstmt = $conexion->prepare($queryInsert);
            $nombre = $_SESSION["alumno"]->getNombreAlumno() . " " . $_SESSION["alumno"]->getApellidoAlumno();
            //El sexo como valor numerico?¿?¿?¿???¿?¿
            if ($_SESSION["alumno"]->getSexoAlumno() == "hombre") {
                $sexo = 0;
            } else {
                $sexo = 1;
            }
            $nacimiento = $_SESSION["alumno"]->getFechaNacimiento();
            $dni = $_SESSION["alumno"]->getDniAlumno();

            if ($fichero = $_SESSION["alumno"]->getArchivoAlumno()) {

                $fichero = $_SESSION["alumno"]->getArchivoAlumno();
            } else {

                $fichero = "";
            };

            $PDOstmt->execute(array($nombre, $sexo, $nacimiento, $dni, $fichero));

            //Actualizamos los modulos
            $arrayModulos = $_SESSION["seleccion"]->getModulosEleguidos();
            foreach ($arrayModulos as $value) {//Por cada modulo que tenga una update
                $PDOstmt = $conexion->prepare($queryUpdate);
                $cod = $value->getCod();
                $PDOstmt->bindParam(':cod', $cod);
                $PDOstmt->execute();
            }

            //Insertar una fila por cada modulo en la lista de matricula

            $conexion->commit();
            $PDOstmt->closeCursor(); //Cerramos cursor
            $conexion = null;
            return true;
        } catch (Exception $ex) {
            $conexion->rollback();
            die("Se ha produccido un error" . $ex->getMessage());
            return false;
        }
    }
    
    
    /*Contador de matriculas
     * Metodo que cuenta todas las matriculas que tenemos en la tabla matricula
     */

    public function contarMatriculas()
    {
          $conexion = $this->conexion();
        $query = "SELECT count(*)+1 FROM `matricula`";       
        try {
            
            $resultadoConsulta = $conexion->query($query);
            if (isset($resultadoConsulta)) {
                $numeroMatriculados=$resultadoConsulta->fetchColumn();
            }

            return $numeroMatriculados;
            
        } catch (Exception $ex) {
            die("Se ha produccido un error" . $ex->getMessage());
        }
    }
    
    
    
}
