<?php

/*
  Funciones utiles para objetos y clases (PHP 5 y superior)
 */
//Definimos una clase muy simple para pruebas:
class Prueba
{
    private $atributoPruebaPrivado;
    public $atributoPruebaPublico;

    function getAtributo()
    {
        return $this->atributoPruebaPrivado;
    }
}

//Instaciamos un objeto de la clase prueba:
$objetoPrueba = new Prueba();

/*clone()
 * Nos sirve para copiar un objeto
 * Se crea una copia con los atributos del mismo objeto
 * EXPLICACION:
 * $objetoCopia1=$objetoPrueba;
    $objetoCopia1->atributoPruebaPublico="Este valor cambiara en el objeto original tambien";
    echo $objetoPrueba->atributoPruebaPublico;
 */

$objetoCopia = clone ($objetoPrueba);
$objetoCopia->atributoPruebaPublico = "Al hacer clone ahora si realmente le estamos copiando";
echo $objetoPrueba->atributoPruebaPublico; //No dara nada
echo $objetoCopia->atributoPruebaPublico;

/*Comparadores == y ===
Si utilizas el operador de comparación ==, comparas los valores de los atributos de los objetos.
Por tanto dos objetos serán iguales si son instancias de la misma clase
y, además, sus atributos tienen los mismos valores. */
$p = new Producto();
$p->nombre = 'Samsung Galaxy S';
$a = clone ($p);
// El resultado de comparar $a == $p da verdadero
//  pues $a y $p son dos copias idénticas

/*
Sin embargo, si utilizas el operador ===, el resultado de la comparación será true
sólo cuando las dos variables sean referencias al mismo objeto.
 */
$p = new Producto();
$p->nombre = 'Samsung Galaxy S';
$a = clone ($p);
// El resultado de comparar $a === $p da falso
//  pues $a y $p no hacen referencia al mismo objeto
$a = &$p;
// Ahora el resultado de comparar $a === $p da verdadero
//  pues $a y $p son referencias al mismo objeto.





/*instanceof
 *  -Comprueba si el objeto es una instancia de una clase determinada
 *  -Devuelve true||false
 */

if ($objetoPrueba instanceof Prueba) { echo "es de la clase";
} else { echo "no es de la clase";
}

/*get_class
 *  Devuelve el nombre de la clase del objeto
 */
echo get_class($objetoPrueba);

/*class_exists
 * Comprueba si la clase esta definida o no
 * Devuelve true si esta definida o false si no lo esta
 * CUIDADO!!! Le pasamos el nombre de la clase entre comillas
 */
if (class_exists('Prueba')) { echo "existe";
} else { echo "no existe";
}

/*get_declared_classes
 * Devuelve un array con los nombres de las clases definidas.
 * Devolvera TODAS las clases incluso las incluidas por defecto
 */
//print_r(get_declared_classes());

/*class_alias
 * -Crea un alias para una clase
 * -Puedo crear objetos usando el alias o el nombre original de la clase
 */
class_alias("Prueba", "NuevoAlias");
$objetoPrueba2 = new NuevoAlias(); //Puedo crear un nuevo objeto con el alias...
if ($objetoPrueba2 instanceof Prueba) { echo "es de la clase";
} else { echo "no es de la clase"; //Que sera de la misma clase...
}
$objetoPrueba2->getAtributo(); //...igual en metodos y atributos
$objetoPrueba3 = new Prueba(); //Como vemos puedo usar el alias o el nombre original

/*get_class_methods
 * Devuelve un array con los nombres de los metodos de una clase
 */
print_r(get_class_methods("Prueba"));

/*method_exists
 * Indica si el metodo existe en la clase
 * Devuelve true si existe o false si no existe
 */

if (method_exists("Prueba", "getAtributo")) { echo "el metodo existe";
} else { echo "el metodo no existe";
}

/*get_class_vars
 * Devuelve un array con los nombre de los atributos de una clase
 * -Solo los accesibles
 */
print_r(get_class_vars("Prueba"));

/*get_object_vars
 * Devuelve un array con los nombres de los metodos del objeto
 * -Solo los accesibles
 */
print_r(get_object_vars($objetoPrueba));

/*property_exists
 * Comprueba si existe el atributo en el objeto o la clase
 * Devuelve true si existe y false si no existe
 * Indempendiente de si es accesible o no
 */

if (property_exists("Prueba", "atributoPruebaPrivado")) { echo "la propiedad si exite";
} else { echo "la propiedad no existe";
}
//if (property_exists("objetoPrueba", "atributoPruebaPublico")) echo "la propiedad si exite";else echo "la propiedad no existe";

/*APUNTE EXTRA:
Desde PHP5, puedes indicar en las funciones y métodos de qué clase deben ser los objetos que se pasen como parámetros. Para ello, debes especificar el tipo antes del parámetro.

public function vendeProducto(Prueba $objetoPrueba) {
     …
}

Si cuando se realiza la llamada, el parámetro no es del tipo adecuado,
se produce un error que podrías capturar.
Además, ten en cuenta que sólo funciona con objetos (y a partir de PHP5.1 también con arrays)
 */
