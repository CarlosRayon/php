<?php
/*
  Clase que definira los modulos
 */

class Modulo
{
    //Atributos
    protected $cod, $nombre, $horas, $curso, $plazas, $ciclo;

    //Constructor
    function __construct($cod, $nombre, $horas, $curso, $plazas, $ciclo)
    {
        
        $this->cod = $cod;
        $this->nombre = $nombre;
        $this->horas = $horas;
        $this->curso = $curso;
        $this->plazas = $plazas;
        $this->ciclo = $ciclo;
    }

    //Metodos setter y getter    
    function getCod()
    {
        return $this->cod;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getHoras()
    {
        return $this->horas;
    }

    function getCurso()
    {
        return $this->curso;
    }

    function getPlazas()
    {
        return $this->plazas;
    }

    function getCiclo()
    {
        return $this->ciclo;
    }

    function setCod($cod)
    {
        $this->cod = $cod;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setHoras($horas)
    {
        $this->horas = $horas;
    }

    function setCurso($curso)
    {
        $this->curso = $curso;
    }

    function setPlazas($plazas)
    {
        $this->plazas = $plazas;
    }

    function setCiclo($ciclo)
    {
        $this->ciclo = $ciclo;
    }

}
