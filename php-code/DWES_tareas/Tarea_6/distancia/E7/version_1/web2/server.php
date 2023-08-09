<?php

require_once './Funciones.php';

//Creamos una variable con la uri que tiene el servidor que guarda las funciones. En este caso este mismo archivo
$uri = "http://dwes18/distancia/E7/version_1/web2";

/*El primer parametro como null ya que no vamos a usar WSDL*/
$server = new SoapServer(null, array("uri" => $uri));

//Añadimos la clase que controla las funciones que usara SOAP (añadimos la clase de funciones completa)
$server->setClass("MisFunciones");

/* Manejamos la peticion*/
$server->handle();
    