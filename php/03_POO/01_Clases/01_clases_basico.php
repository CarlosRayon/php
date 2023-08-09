<?php

/*
 * -Cada clase debe ir en un archivo
 * -Los atributos y funciones de la clase se pueden declarar como:
 *     -private: Accesibles desde la clase que los contiene.Solo accesibles mediante metodos de la clase
 *     -public:  Accesibles desde cualquier lado. Pueden utilizarse directamente por los objetos de la clase(antes en PHP se ponia var que seria igual a public).
       -protected: Accesibles desde la clase que los contiene y desde la clase que lo herede.CUIDADO!!! No accesible desde el objeto instanciado de la clase, igual que el privado

 * -El operadore $this hace referencia a propiedades de la propia clase!!
 * -El operador self hace referencia a la clase del objeto actual.(Se usa en vez de $this para los atributos y metodos estaticos)
 * -El operador :: nos permite acceder  a los elementos de una clase como constantes y miembros estaticos
 *
 * RECUERDA!!!: Para haceder a las propiedades y metodos usamos el operador flecha ->  (en vez del punto como en otros lenguajes)
 *
 */

//Definicion de la clase:
class NombreClase
{

    //Atributos
    public $atributo1;
    private $atributo2;
    protected $atributo3;
    //Podemos definir el valor de un atributo.(Al crear objetos de la clase, el objeto tendra ya definido este atributo)
    public $atributo4 = "Atributo ya definido en la propia clase";

    /* Atributos constantes
      -No se puede cambiar su valor una vez definido
      -No se pone el simbolo $ al definirlos
      -Se recomienda poner el nombre del atributo en mayusculas
      -Su valor siempre va entre comillas, AUN siendo numeros.
     */

    const ATRIBUTOCONST = "constante";
    const ATRIBUTOCONSTNUMERO = "5";

    //Craariamos un metodo constructor si fuera necesario(ver metodo _construct

    //Metodos (normalmente son publicos o protected)
    public function cambiarNombre($valor)
    {
        //Damos valor al atributo1
        $this->atributo2 = $valor;
    }

    public function nombreFuncion()
    {
        //Mostramos el valor del atributo1
        print "<p>" . $this->atributo2 . "</p>"; //CUIDADO!!!El atributo se pone sin $
    }
}

/* RECUERDA!!!
 * Debemos declarar la clase en donde la queramos usar usando:
  require 'NombreClase.php';
  require_once 'NombreClase.php';
  include 'NombreClase.php';
  include_once 'NombreClase.php';
 */

/* Si queremos crear objetos de la clase la INSTANCIAMOS de la siguinete manera */

$objeto = new NombreClase();


/* HACESO A LOS ATRIBUTOS Y METODOS DE LA CLASE:
  -usamos operador flecha ->
 */

//MODIFICACION
$objeto->atributo1 = "Aributo publico"; //Modificamos el atributo publico, directamente
$objeto->cambiarNombre("Atributo privado"); // Modificamos el atributo privado o publico, mediante un metodo de la clase
//
//ACCESO A LOS VALORES
echo $objeto->atributo1; //Mostramos el atributo publico directamente
$objeto->nombreFuncion(); //Mostramos el atributo privado mediante funcion
echo $objeto->atributo4; //Mostramos el atributo ya definido en la clase

/* Para acceder a los atributos constantes usamos NombreClase::ATRIBUTOCONSTANTE; */
echo NombreClase::ATRIBUTOCONST;
echo NombreClase::ATRIBUTOCONSTNUMERO + 6;

//NombreClase::ATRIBUTOCONST="hola"; No se puede modificar un atributo constante
//$variable->.... El atributo private y protected no nos saldran, solo los publicos.
