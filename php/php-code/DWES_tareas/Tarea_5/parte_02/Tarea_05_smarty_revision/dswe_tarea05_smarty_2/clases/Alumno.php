<?php

/*
  Clase que servira para crear objetos de tipo Alumno
 */

class Alumno
{
    /* Atributos:
      -Se corresponden con los datos capturados en el formulario
     */

    private $nombreAlumno, $dniAlumno, $sexoAlumno, $fechaNacimiento,$archivoAlumno;

    //Metodo constructor
    function __construct($nombreAlumno, $dniAlumno, $sexoAlumno, $fechaNacimiento,$archivoAlumno)
    {
        $this->nombreAlumno = $nombreAlumno;      
        $this->dniAlumno = $dniAlumno;
        $this->sexoAlumno = $sexoAlumno;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->archivoAlumno=$archivoAlumno;
    }
    
        //Metodos setter y getter
    public function getNombreAlumno()
    {
        return $this->nombreAlumno;
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

    function setNombreAlumno($nombreAlumno)
    {
        $this->nombreAlumno = $nombreAlumno;
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

 
    function getArchivoAlumno()
    {
        return $this->archivoAlumno;
    }

    function setArchivoAlumno($archivoAlumno)
    {
        $this->archivoAlumno = $archivoAlumno;
    }
    
}
