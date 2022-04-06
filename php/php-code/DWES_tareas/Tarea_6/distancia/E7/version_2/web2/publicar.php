<?php

require_once './Funciones.php';//Incluimos archivo con la clase de las funciones
require_once './WSDLDocument.php';//Incluimos archivo WSDL


ini_set('error_reporting', E_ALL); // sale mensaje
ini_set('display_errors', 0); //para que salten las alarmas y genere 

/*
 $url="Especifica la ubicación del fichero servidor con los comentarios @param..." Fichero que usaremos para publicar las funciones;
 $uri="especifica la ubicación de los ficheros dominio de nombres";
 */

$url="http://localhost/dwes18/distancia/E7/version_2/web2/server2.php";
$uri="http://localhost/dwes18/distancia/E7/version_2/web2/";

$wsdl = new WSDLDocument("MisFunciones", $url, $uri);//clase donde defino las funciones , $urñ, $uri


header('Content-Type: text/xml');

echo $wsdl->saveXml();
/*Le uso la primera vez para que me cree el documento wdls directamente
$wsdl->save("funcioneswdls.wdls");
 */