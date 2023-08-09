<?php
/*
  Clase comun que hereda de la clase modulo
 */
class Comun extends Modulo
{

    /* Atribuos propios de la clase Comun */

    protected $codigo, $departamento;

    /* Constructor */
    function __construct($cod, $nombre, $horas, $curso, $plazas, $codigo, $departamento)
    {
        parent::__construct($cod, $nombre, $horas, $curso, $plazas, "COM"); //Como siempre sera COM y no le pasamos le pongo asi

        $this->departamento = $departamento;
    }

    /* Metodo getter y setter propios de esta clase */

    function getDepartamento()
    {
        return $this->departamento;
    }

    function setDepartamento($departamento)
    {
        $this->departamento = $departamento;
    }

}
