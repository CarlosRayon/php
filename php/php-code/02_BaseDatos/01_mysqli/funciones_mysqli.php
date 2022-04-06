<?php

/*
Funciones Utiles para:

SELECT:

$resultado->fetch_array()                       //Devulve un array asociativo tanto por clave(nombre del campo de la base Datos) como por indice
$datos=$resultado->fetch_assoc($resultado);     //array claves asociativas
$datos=$resultado->fetch_row($resultado);       //array claves numericas
$datos=$resultado->fetch_object($resultado);    //crea un objeto

$conexion->num_rows($result);                   //numero columnas devueltas


INSERT:
$conexion->affected_rows()                      //Numeros de filas afectadas por la operacion





UPDATE:
$conexion->affected_rows()                      //Numeros de filas afectadas por la operacion




DELETE:
$conexion->affected_rows()                      //Numeros de filas afectadas por la operacion

EN GENERAL:

$conexion->select_db('otra_bd');                //cambiar de base de datos depues de conectada
$conexion->close();                             //Cerrar la conexion despues de acabar y liberar recursos
$conexion->exit(<opcional mensaje>);             //Termina el scrip actual (imprime mensaje opcional)
$conexion->query(<consulta>);                   //Para ejecutar una consulta
$conexion->connect_errno                        //Devuelve codigo error si todo ha ido bien devolvera nada o o
$conexon->real_escape_string(<variable que pasare a al consulta>);  //Evitar inyecccion SQL ejemplo:  $nombre=$conexon->real_escape_string($_POST["nombre");

 */
