<?php

include './Funciones.php';//Incluimos donde tenemos clases con las funciones

$uri="http://localhost/dwes18/distancia/E7/version_2/web2/";

/*Le pasamos la ubicacion del archivo wdsl creado con wsdldocument*/
$server = new SoapServer("http://localhost/dwes18/distancia/E7/version_2/web2/funcioneswsdl.wsdl");

$server->setClass('MisFunciones');//Añadimos clase con las funciones

$server->handle();//Publicamos


