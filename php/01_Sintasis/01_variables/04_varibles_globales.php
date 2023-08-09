<?php

/*Variable globales
   -Como en PHP las variables no se definen primero con palabra clave. Si definimos una variable en la funcion su ambito sera el de la funcion.
    -si queremos que tenga ambito global debemos definirla en la funcion como global.
 */

//EJEMPLO 1:
echo $varGlobal = "global" . "<br>";

function mostrar()
{
    global $varGlobal; //Al ponerla global se iguala a al variable de fuera
    echo $varGlobal . "<br>";
}
mostrar();


//EJEMPLO 2:
function mostrar2()
{
    global $a;
    echo $a . "<br>";
}

$a = "variable global";
mostrar2();

$a .= " cadena añadida" . "<br>";

mostrar2();
