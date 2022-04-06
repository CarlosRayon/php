<?php

/*Creamos las direcciones donde el cliente tiene disponibles las funciones*/
$url="http://localhost/PHP/PHP/05_servicios_web/ejemploNOwdls/servidor/servidor.php";
$uri="http://localhost/PHP/PHP/05_servicios_web/ejemploNOwdls/servidor";

/*Creamos un objeto Cliente soap pasandole las direcciones donde tenemos las funciones*/
$cliente= new SoapClient(null, array("location"=>$url,"uri"=>$uri));

/*Usamos las funciones normalmente*/
$respuesta=$cliente->adiosMundo("sale, flipoooo");


echo "si esto " . $respuesta;

