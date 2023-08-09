<?php

/*
Implementamos interfaces con implements
 */
require './01_interface.php';
class Subclase implements Interfaz //RECUERDA!!! Podemos implementar mas de una interfaz separandolas por ,
{
    public function muestra($valor) //RECUERDA!!! Si el metodo la interfaz tiene parametro al implementarla tambien
    {
        print "metodo de la interfaz" . $valor;
    }
}

//RECUERDA!!!La única restricción es que los nombres de los métodos que se deban
// implementar en los distintos interfaces no coincidan
