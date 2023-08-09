<?php

/*
 * ATRIBUTOS Y METODOS ESTATICOS:
     -La mayor diferencia es que no es necesario instanciar objetos para usarlos, se usan llamando a la clase directamente.
     -Se definen con la palabra clave static
     -Dentro de la clase usamos la palabra clave self para referirnos a los atributos estatico, en vez de usar el $this
     -La clase puede combinar atributos y metodos tanto estaticos como "normales".
     -Utiles para crear una clase con este tipos de metodos y usar estos metodos a discrecion
     -Utiles para guardar informacion general sobre la clase(ejemplo: Numero objetos instanciados)
 */

class Estaticos
{
    //ATRIBUTOS ESTATICOS
    public static $atributoEstaticoPublico;
    private static $atributoEstaticoPrivado;
    //Podemos definir el valor de un atributo.(Al crear objetos de la clase, el objeto tendra ya definido este atributo)
    public static $atributoEstaticoDefinido = "Atributo estatico ya definido en la propia clase";

    //METODOS ESTATICOS
    static function getAtributoEstaticoPrivado()
    {
        return self::$atributoEstaticoPrivado; //usamos el self en vez de $this por se atributo estatico
    }

    static function setAtributoEstaticoPrivado($atributoEstaticoPrivado)
    {
        self::$atributoEstaticoPrivado = $atributoEstaticoPrivado; //usamos el self en vez de $this por se atributo estatico
    }

    public static function sumar($num1, $num2)
    {
        return $num1 + $num2;
    }

    public static function mostraDatos()
    {
        echo self::$atributoEstaticoPublico . self::$atributoEstaticoPrivado . self::$atributoEstaticoDefinido . "<br>"; //usamos el self en vez de $this por se atributo estatico
    }
}

//RECUERDA!! En archivo aparte llamar primero a la clase con require o include

/*ACCESO Y MODIFICACION DE LOS ATRIBUTOS Y METODOS ESTATICOS:
 *  -Al ser estaticos no es necesario instanciar objetos de la clase para usarlos.
 *  -Se pueden usar tambien al instanciar un objeto de la clase.
 *  -Se comportan igual que los atributos y metodos "normales"
 */

Estaticos::$atributoEstaticoPublico = "atributo publico estatico"; //Defino el ESTATICO PUBLICO directamente
//echo Estaticos::$atributoEstaticoPublico;//Muestro el ESTATICO PUBLICO directamente

Estaticos::setAtributoEstaticoPrivado("atributo privado estatico"); //Defino el ESTATICO PRIVADO mediante un metodo
//echo Estaticos::getAtributoEstaticoPrivado();//Muestro el ESTATICO PRIVADO mediante un metodo

Estaticos::mostraDatos(); //Metodo estatico

$suma = Estaticos::sumar(5, 6);
echo $suma . "<br>";

//Con un objeto de la clase se usan normalmente:
$objeto = new Estaticos();
$objeto->mostraDatos();
echo $objeto->sumar(5, 7) . "<br>";
