<?php

/*
 * Clase padre:
 * RECUERDA!!! Si pondriamos antes del class la palabra reservada final no se podria hacer herencia de esta clase
 */

class ClasePadre
{
    //Atributos protect (Accesibles desde clases hijas pero no desde fuera)
    protected $atributoPadre1;
    protected $atributoPadre2;
    protected $atributo;


    //Constructor
    function __construct($atributo)
    {
        $this->atributoPadre1 = " valor atributo padre 1";
        $this->atributoPadre2 = " valor atributo padre 2";
        $this->atributo = $atributo;
    }

    //Metodos
    public function verAtributosPadre()
    {
        echo $this->atributoPadre1 . " " . $this->atributoPadre2 . " " . $this->atributo;
    }


    public function probarParents()
    {
        echo $this->atributoPadre1;
    }
}
