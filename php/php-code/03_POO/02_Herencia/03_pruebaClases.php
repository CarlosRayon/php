<?php

/*
 * -MIRAR PRIMERO CLASEPADRE, CLASEHIJO Y LUEGO ESTE ARCHIVO
 */

//incluyo la clase hija que hereda de la clase padre(?)
require_once './02_ClaseHijo.php';


//instancio un objeto de la clase hija
$hijo = new ClaseHija("valor atributoHijo2", "valor atributoHijo2", "atributo del contructor padre");

//Puedo llamar metodo propio de la clase hija...
$hijo->verAtributosHijos();
//y puedo llamar al  metodo que hereda de la clase padre
$hijo->verAtributosPadre();

//Vamos a probar el funcionamiento del parents::
$hijo->probarParents(); //muestra el atributo del padre porque evito sobreescribir el metodo con parents::

//(?)Podemos instanciar la clase padre sin estar directamente incluida porque ya la hereda la clase hija
$padre = new ClasePadre("atributo por parametro para el padre");
$padre->verAtributosPadre();

//Podemos ver que una clase hija tambien es intancia de la clase padre*/
if ($hijo instanceof ClasePadre) {
    echo "es instancia tambien de la clase padre";
}
