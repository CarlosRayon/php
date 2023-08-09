<?php

/*
 * Clase hija que heredara los atributos y metodos de la clase padre.
 * Para hacer que herede:
 *  -Incluimos la clase padre con include o requiere
 *  -Añadimos extends NombreClaseHeredar
 * RECUERDA!!! Si pondriamos antes del class la palabra reservada final no se podria hacer herencia de esta clase
  RECUERDA!!! No podemos hacer herencia multiple. La simulamos con interfaces
 */

require_once './01_ClasePadre.php';

class ClaseHija extends ClasePadre
{

    //Atributos propios de la clase hija(los objetos instanciados de esta clase tendran tambien los atributos de la clase padre
    protected $atributohijo1;
    protected $atributohijo2;


    //Constructor
    function __construct($atributohijo1, $atributohijo2, $atributo)
    {

        parent::__construct($atributo); //LLamo al constructor de la clase padre para que no se sobreescriba sino no se inicializan.

        $this->atributohijo1 = $atributohijo1;
        $this->atributohijo2 = $atributohijo2;

        //En el constructor podemos acceder a los atributos y metodos de la clase padre porque son protected
        // $this->atributoPadre1;
    }

    //Metodos
    public function verAtributosHijos()
    {
        echo $this->atributohijo1 . " " . $this->atributohijo2;
    }

    public function probarParents()
    {
        //Si pongo esto sobreescribo el metodo original del padre...
        //     echo $this->atributohijo1;

        parent::probarParents(); //... Lo evito usando parent::
    }
}
