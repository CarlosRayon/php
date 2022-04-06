<?php

/*
Variables de sesión:
   $_SESSION[];
   Para usar las variable de sesión primero iniciar sesion en todos los documentos donde las vayamos a usar con session_start():
 */
session_start();

/* La sesion iniciada podemos guardar datos en variables de session*/
$_SESSION["nombre"] = "dato que quiero guardar";
$_SESSION["nombre"] = $_POST["dato"]; //Guardo un dato capturado de un formulario por metodo post

/*Para guardar objetos los deberiamos serializar
$p= new Objetos();
$a= serialize($p);
$_SESSION["nombre"]=$a;
*/

/*PHP lo hace de forma automatica por lo que...*/
$p = new Objetos();
$_SESSION["nombre"] = $p;
