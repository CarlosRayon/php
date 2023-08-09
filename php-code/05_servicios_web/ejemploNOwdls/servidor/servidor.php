<?php

//Clase que tendra las funciones que queremos añadir al servidor. Puedo poner las funciones sin clase directamente aqui tambien
class Funciones
{

    public function __construct()
    {
        
    }

    public function holaMundo($a, $b)
    {
        return "Hola Mundo " . $a + $b;
    }

    public function adiosMundo($a)
    {
        return "Adios mundo cruel " . $a;
    }

}

//Creamos una variable con la uri que tiene el servidor que guarda las funciones. En este caso este mismo archivo
$uri = "http://PHP/PHP/05_servicios_web/ejemploNOwdls/servidor";

/* Constructor del Server:
  1º parametro: Direccion del fichero WSDL. Si no queremos usar WSDL pasamos null
  2º parametro; La uri donde tendremos las funciones definidas
 */
$server = new SoapServer(null, array("uri" => $uri));

//Añadimos la clase que controla las funciones que usara SOAP RECUERDA!!! Incluimos la clase antes con include 
$server->setClass("Funciones");

/* Con addFunction() Añadimos funciones  soap

  //       $server->addFunction("holaMundo"); //añadimos una sola funcion
  // $server->addFunction(array("funcion1", "funcion2"));Añadimos mas de una funcion a la vez

 */

/* Procesamos una petición SOAP, llama a las funciones necesarias y envía una respuesta. */
$server->handle(); //Si parametro se asume que los datos estan el POST?¿
    