<?php

/*
  Clase que servira para crear objetos de tipo Alumno
 */

class Alumno
{
    /* Atributos:
      -Se corresponden con los datos capturados en el formulario
     */

    private $nombreAlumno, $apellidoAlumno, $dniAlumno, $sexoAlumno, $fechaNacimiento, $cicloAlumno,$archivoAlumno;

    //Metodo constructor
    function __construct($nombreAlumno, $apellidoAlumno, $dniAlumno, $sexoAlumno, $fechaNacimiento, $cicloAlumno,$archivoAlumno)
    {
        $this->nombreAlumno = $nombreAlumno;
        $this->apellidoAlumno = $apellidoAlumno;
        $this->dniAlumno = $dniAlumno;
        $this->sexoAlumno = $sexoAlumno;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->cicloAlumno = $cicloAlumno;
        $this->archivoAlumno=$archivoAlumno;//Para añadir en POO_paso3.php si es necesario
    }
    
        //Metodos setter y getter
    public function getNombreAlumno()
    {
        return $this->nombreAlumno;
    }

    function getApellidoAlumno()
    {
        return $this->apellidoAlumno;
    }

    function getDniAlumno()
    {
        return $this->dniAlumno;
    }

    function getSexoAlumno()
    {
        return $this->sexoAlumno;
    }

    function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    function getCicloAlumno()
    {
        return $this->cicloAlumno;
    }

    function setNombreAlumno($nombreAlumno)
    {
        $this->nombreAlumno = $nombreAlumno;
    }

    function setApellidoAlumno($apellidoAlumno)
    {
        $this->apellidoAlumno = $apellidoAlumno;
    }

    function setDniAlumno($dniAlumno)
    {
        $this->dniAlumno = $dniAlumno;
    }

    function setSexoAlumno($sexoAlumno)
    {
        $this->sexoAlumno = $sexoAlumno;
    }

    function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setCicloAlumno($cicloAlumno)
    {
        $this->cicloAlumno = $cicloAlumno;
    }
    function getArchivoAlumno()
    {
        return $this->archivoAlumno;
    }

    function setArchivoAlumno($archivoAlumno)
    {
        $this->archivoAlumno = $archivoAlumno;
    }

    /* funcion STATICA crearAlumno*
        Evalua si hay un objeto de tipo alumno creado:
         -Si no le hay, creo objeto tipo Alumno y lo guarda en una variable de session
         -Si si le hay, modifico sus atributos con lo metodos propios del objeto
          @argument {String} Sera el name del boton que quiero evaluar que he pulsado
     */
    public static function crearAlumno($botonPulsado)
    {
        if (isset($botonPulsado)) {
            
            if (!isset($_SESSION["alumno"])) {//NO existe la variable de sesion que sera un objeto de tipo Alumno...
                
                $_SESSION["alumno"] = new Alumno($_GET["nombre"], $_GET["apellido"], $_GET["dni"], $_GET["sexo"], $_GET["fechanacimiento"], $_GET["cicloformativo"], "");
                
            } else {//Si la variable de session con el objeto esta creada cambio sus atributos por los nuevos valores pasados en el formulario     
                $_SESSION["alumno"]->setNombreAlumno($_GET["nombre"]);
                $_SESSION["alumno"]->setApellidoAlumno($_GET["apellido"]);
                $_SESSION["alumno"]->setDniAlumno($_GET["dni"]);
                $_SESSION["alumno"]->setSexoAlumno($_GET["sexo"]);
                $_SESSION["alumno"]->setFechaNacimiento($_GET["fechanacimiento"]);
                $_SESSION["alumno"]->setCicloAlumno($_GET["cicloformativo"]);
               
                
            }
        }
    }

    
    
    
}
