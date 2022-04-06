<?php

/* 
 *Clase que usaremos para insertar los usuarios en la base de datos
 */

//Incluimos la clase que nos conectara a la base de datos
require  './Insercion.php';
//Incluimos la clase Usuarios para poder trabajar con ella
require './Usuario.php';

//Creamos un nuevo usuario capturando los datos pasados por el formulario
$usuario= new Usuario($_POST['idusuario'], $_POST['nombreusuario'], $_POST['emailusaurio'], $_POST['passusuario']);

//Creamos un objeto con la conexion a la base de datos
$conexion= new Insercion();

//Usamos el metodo de insertar usuario pasandole el usuario creado con los valores obtenidos del formulario
$conexion->insertarUsuario($usuario);
