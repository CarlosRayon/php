<?php
/*
Variables por referencia:
    -La referencia indica que los cambios efectuados en cualquier variable afecta a los dos.
    -Se usan en los parametros de las funciones
    -Se establece un vinculo(REFERENCIA) con la variable externa.
    -Los cambios efectuados dentro de la funcion a la variable pasada por referencia
     se mantiene en la variable externa
 */
//Ejemplo de referencia:
$a = "valor para a";
echo $a;
$b = &$a; //$b va a referenciar a $a (Como si seria la misma variable)
$b = "valor para b";
echo $a;

//EJEMPLO 1:
//Crea la función indicando el parámetro por referencia
function agregar_algo(&$cadena)
{
    $cadena .= 'y algo más.';
}

$cad = 'Esto es una cadena, ';

//Manda a llamar la función indicando solo el parámetro
agregar_algo($cad);
echo $cad;    // imprime 'Esto es una cadena, y algo más.'

//EJEMPLO 2:
$a = 5;
function suma(&$a) //quitar y poner  & para ver los cambios
{
    $a++;
    echo $a;
};

suma($a);

echo $a;
