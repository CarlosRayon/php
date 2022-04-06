<?php

/*
 * Clase que define a los usuarios
 */

class Usuario
{
    //atributos

    private $idusuario;
    private $nombreusuario;
    private $emailusuario;
    private $passusuario;

    //Constructor
    function __construct($idusuario, $nombreusuario, $emailusuario, $passusuario)
    {
        $this->idusuario = $idusuario;
        $this->nombreusuario = $nombreusuario;
        $this->emailusuario = $emailusuario;
        $this->passusuario = $passusuario;
    }

    //metodos setter y getter
    function getIdusuario()
    {
        return $this->idusuario;
    }

    function getNombreusuario()
    {
        return $this->nombreusuario;
    }

    function getEmailusuario()
    {
        return $this->emailusuario;
    }

    function getPassusuario()
    {
        return $this->passusuario;
    }

    function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    function setNombreusuario($nombreusuario)
    {
        $this->nombreusuario = $nombreusuario;
    }

    function setEmailusuario($emailusuario)
    {
        $this->emailusuario = $emailusuario;
    }

    function setPassusuario($passusuario)
    {
        $this->passusuario = $passusuario;
    }
}
