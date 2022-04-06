<?php
/*
 Con los metodos implementados en una clase generamos el fichero php que nos servira para generar
 el  archivo .wdls donde seran definidos los metodos por xml
 */

require_once './01_funciones.php'; //Incluimos el fichero donde tenemos definidas las funciones
require_once './WSDLDocument.php'; //Incluimos el fichero que generara el .wdls

ini_set('error_reporting', E_ALL); // sale mensaje
ini_set('display_errors', 0); //para que salten las alarmas y genere
/*
 $url="Especifica la ubicación del fichero servidor con los comentarios @param...";
 $uri="especifica la ubicación de los ficheros dominio de nombres";
 */

$url = "http://localhost/PHP/PHP/05_servicios_web/ejemploConwdls/servidor/03_server.php"; //RECUERDA!!! añadimos el archivo que usaremos de servidor
$uri = "http://localhost/PHP/PHP/05_servicios_web/ejemploConwdls/servidor/";

$wsdl = new WSDLDocument("Funciones", $url, $uri); //primer parametro es la clase con las funciones

header('Content-Type: text/xml');

echo $wsdl->saveXml();//Para mostrar el documento en el navegador

/*Le uso la primera vez para que me cree el documento wdls directamente
$wsdl->save("funcioneswdls.wdls");
 */
