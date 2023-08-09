<?php

/*
En PHP, para serializar un objeto se utiliza la función serialize.
 *  El resultado obtenido es un string que contiene un flujo de bytes,
 *  en el que se encuentran definidos todos los valores del objeto.
 */

$p = new Producto();
$a = serialize($p);
/*Esta cadena se puede almacenar en cualquier parte, como puede ser la sesión del usuario,
 *  o una base de datos. A partir de ella, es posible reconstruir el objeto original utilizando
 * la función unserialize.
 */
$p = unserialize($a);
