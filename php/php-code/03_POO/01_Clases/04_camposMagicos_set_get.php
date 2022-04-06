<?php

/*
 * Con los "camposMagicos" podemos ver y modificar una propiedad privada directamente (como si fuera publica)
 *
 * Incovenientes:
 * -No funcionan con constructores
 * -No funciona el autocompletado en los editores
 * -Se puede acceder directamente a los campos declarados como privados por lo que:
 *      -Se pierde la modularidad.
 *      -No es un metodo seguro.
 *
 */

class Magicos
{

    private $campo1, $campo2;
    private $datos = array();

    //Esto codigo vale para cualquier clase
    public function __set($propiedad, $valor)
    {
        if (property_exists(get_class(), $propiedad)) {
            $this->datos($propiedad) = $valor;
        }
    }

    public function __get($propiedad)
    {
        if (array_key_exists($propiedad, $this->datos)) {
            return $this->datos($propiedad);
        }
    }
}

//Creamos un objeto de la clase
$n = new Magicos();
//Podemos acceder a modificar el atributo directamente
$n->campo1 = "carlos";
echo $n->campo1;
