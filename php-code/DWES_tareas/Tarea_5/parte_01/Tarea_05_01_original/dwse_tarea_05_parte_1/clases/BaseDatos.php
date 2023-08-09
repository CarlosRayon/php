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
        $conexion = new mysqli($this->servidor, $this->usuario, $this->pass, $this->baseDatos);
        if ($conexion->connect_errno) {
            printf("Error de conexión: %s\n", $conexion->connect_error);
            exit();
        } else {
            return $conexion; //No hay error, devolvemos la conexion
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
        if ($resultadoConsulta = $conexion->query($query)) {
            while ($filaArray = $resultadoConsulta->fetch_assoc()) {
                array_push($this->listadoCiclos, $filaArray);
            }
            return $this->listadoCiclos;
            $conexion->close();
        } else {
            echo "Has tenido el siguiente error:<br />" . $conexion->error;
            $conexion->close();
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
        // $query="SELECT nombre  FROM `modulo` WHERE `ciclo` = $ciclo";
        $query = "SELECT * FROM modulo WHERE ciclo =\"" . $ciclo . "\" AND plazas>0";

        if ($resultadoConsulta = $conexion->query($query)) {
            while ($filaArray = $resultadoConsulta->fetch_assoc()) {
                array_push($this->listadoModulos, $filaArray);
            }
            return $this->listadoModulos;
            $conexion->close();
        } else {
            echo "Has tenido el siguiente error:<br />" . $conexion->error;
            $conexion->close();
        }
    }

    
    /* Metodo insertarAlumno 
     * -Metodo para insertar los datos de alumno dentro de la tabla matricula (consulta preparada)
     */
    public function insertarAlumno($objetoAlumno)
    {
        /* Lo primero como simpre nos conectamos a la base de datos */
        $conexion=$this->conexion();
        $query = "INSERT INTO `matricula` (`alumno`, `sexo`, `nacimiento`, `DNI`, `fichero`) VALUES (?,?,?,?,?)";
        //Tantas variables como campos a insertar      
        $nombre = $objetoAlumno->getNombreAlumno() . " " . $objetoAlumno->getApellidoAlumno();
        
        //El sexo como valor numerico?¿?¿?¿???¿?¿
        if ($objetoAlumno->getSexoAlumno() == "hombre") {
            $sexo = 0;
        } else {
            $sexo = 1;
        }
        $nacimiento = $objetoAlumno->getFechaNacimiento();
        $dni = $objetoAlumno->getDniAlumno();
        $fichero = $objetoAlumno->getArchivoAlumno();

        $stmt = $conexion->prepare($query);

        $ok = $stmt->bind_param("sisss", $nombre, $sexo, $nacimiento, $dni, $fichero); //Devuelve true o false

        $pk = $stmt->execute(); //Devuelve true o false

        if ($ok == false) {
            echo "error al ejecutar la consulta";
            return false;
            exit();
        } else {
            return true;
            $stmt->close();
        }
    }
    

 

}
