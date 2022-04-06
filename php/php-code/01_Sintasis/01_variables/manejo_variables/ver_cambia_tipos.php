<?php
/*En PHP tenemos los siguientes tipos de datos
    (int), (integer) - fuerza a entero (integer)
    (real), (double), (float) - fuerza a número con decimales (coma flotante)
    (string) - fuerza a cadena (string)
    (array) - fuerza a array (array)
    (object) - fuerza a objeto (object)
    (unser) - fuerza a null
    (binary) - fuerza a "binary string"
 */


/*--------------PARA VER EL TIPO DE DATO DE UNA VARIABLE ----------
      gettype($variable)
 */

$variable=5;
$variable2="Soy string";

echo gettype($variable) . "<br>";

settype($variable, "float"); //Cambia el tipo

/*-------------PARA CAMBIAR EL TIPO DE DATO A UNA VARIABLE--------------
     settype($variable, "tipoDato");
    
  Disponemos de los siguietes tipos para cambiar
 *  "boolean" (o, desde PHP 4.2.0, "bool")
    "integer" (o, desde PHP 4.2.0, "int")
    "float" (únicamente posible desde PHP 4.2.0, para versiones anteriores use la variante obsoleta "double")
    "string"
    "array"
    "object"
    "null" (desde PHP 4.2.0)
 */

echo ($variable . "<br>");//Imprimo la variable original
settype($variable, "object");//Cambio tipo
echo gettype($variable) . "<br>";//Vemos el nuevo tipo RECUERDA!!! Cambiar el tipo para ver el resultado en pantalla(?)
var_dump($variable);   // Para ver cambio a array y object
echo $variable->scalar . "<br>";//Resultado nuevo tipo (?)

/*Si cambiamos a boolean el resultado sera
          Si la variable tenia algun valor 1
          Si la varialble no tenia valor 0 (nada)
  
  Si cambiamos a array creara un array asociativo 
        var_dump($variable);

 Si cambiamos a object crea un objeto.Para ver los datos del objeto
      echo $variable->scalar   //Pone scalar como propiedad
 */
    

/*Tambien tenemos la opcion de hacer forzado de variables como en otros lenguaje como java 
      $variable = "23";
      $variable = (int) $variable;
 
  */


