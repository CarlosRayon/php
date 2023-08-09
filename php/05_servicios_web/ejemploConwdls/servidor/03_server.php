<?php

/*
Con el xml que describe las funciones, publicamos las funciones en el servidor
 */

require_once './01_funciones.php'; //Incluimos el archivo donde tenemos las funciones

//Creamos un objeto de tipo sopaserver pasando por parametro la ubicacion del archivo wdls crean en el punto 2
$server = new SoapServer("http://localhost/PHP/PHP/05_servicios_web/ejemploConwdls/servidor/funcioneswdls.wdls");

$server->setClass('Funciones'); //pasamos la clase que tiene las funciones

$server->handle();
