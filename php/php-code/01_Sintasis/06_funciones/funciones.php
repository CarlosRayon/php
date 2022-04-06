<?php
/*
Tipos de funciones como crearlas y datos varios
 */

/*FUNCIONES SIMPLES: <nombre_funcion>(<parametros>||<parametros="<valor por defecto>"){<codigo funcion>};
 * -El parametro que tenga valor por defecto debe ser siempre los últimos en la lista
 */

function ejemploFuncion($var = "valor por defecto ")
{
    echo $var;
}
//Se llaman <nombre_funcion>(<argumento>);
ejemploFuncion(); //Si le paso un parametro sustituira a su valor por defecto



/*FUNCIONES VARIABLES:
 * - Si llamamos a esa variable con paréntesis: $func() → PHP buscará una función con el mismo nombre que su contenido y la ejecutará si existe.
 * - Las funciones variables no funcionarán con echo(), print(), unset(), isset(), empty(), include(), require() y derivados.
 */
function prueba($arg)
{
    echo "Estamos en la función prueba(); y el argumento que le pasamos es:'$arg'.<br>\n";
}
$variableFuncion = "prueba";
$variableFuncion("Esto se muestra desde la variable funcion"); // Esto llama prueba(arg)



/*FUNCIONES ANONIMAS: <variable> = function (<$parametro>){<codigo funcion>};
 * Las funciones anónimas, también se conocen como clausuras (closures).
 * Permiten la creación de funciones que no tienen un nombre especificado.
 * Las clausuras también se pueden usar como valores de variables.
 */
$saludo = function ($nombre) {
    printf("Hola %s\r\n", $nombre);
};
$saludo('Mundo');


/*FUNCION CON PARAMETRO POR REFERENCIA function (<&$parametroReferencia>){<codigo funcion>};
 * -Al cambiar el valor dentro de la función lo conserva fuera si la volvemos a usar;
 */
function incrementa(&$a)
{
    $a = $a + 1;
}
$a = 1; //creo variable
incrementa($a); //uso funcion
echo $a; // Muestra un 2 SE sigue mateniendo el valor
