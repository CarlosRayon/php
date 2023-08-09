<?php
/*
 * Podemos declarar los atributos como privados
 * Para acceder a ellos y modificarlos se hace mediante metodos(Por convencion se suele poner: setatributo  getAtributo)
 *  -Metodo get: obtiene informacion del atributo privado
 *  -Metodo set: modifica el atributo
 *  -Se puede crear con boton derecho - insertar setter y getter(netbeans)
 */

class Personas
{
    //Atributos
    private $nombre;

    //Metodo set: nos permite modificar el valor de un atributo
    public function setNombre($nombreCambiar)
    {
        $this->nombre = $nombreCambiar;
    }

    //Metodo get: nos permite obtener el valor de un atributo
    public function getNombre()
    {
        return $this->nombre;
    }
}
