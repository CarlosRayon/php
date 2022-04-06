<?php

/*
Variables estaticas:
    -Ambito local de la función. CONSERVA su valor al llamar  a la funcion varias veces.
 */

function variableEstatica()
{
    static $a = 0;
    echo $a;
    $a++;
}
variableEstatica(); //0
variableEstatica(); //1
variableEstatica(); //2
variableEstatica();//3
