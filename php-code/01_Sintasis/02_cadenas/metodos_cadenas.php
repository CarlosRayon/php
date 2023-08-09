<?php

define("CONSTANTE", "<br>");
/*
 RECUERDA!!! Mucho mas metodos en el pdf
 */

$string = "Esto es un string";

//Para poner todos los caracteres de un string en minusculas:
echo strtolower($string) . CONSTANTE;
//Para poner todos los caracteres de un string en mayusculas:
echo strtoupper($string) . CONSTANTE;
//Para poner el primer caracter de cada cadena en un string en mayusculas:
echo ucwords($string) . CONSTANTE;
//Para poner el primer caracter de la primera cadena en mayusculas:
echo ucfirst($string) . CONSTANTE;
//Para poner el primer caracter de un string en minusculas
echo lcfirst($string) . CONSTANTE;
//Para hacer un shuffle con los caracteres de un string
echo str_shuffle($string) . CONSTANTE;
//Para separar cada caracter de un string y devolver un array
print_r(str_split($string));
echo  CONSTANTE;
//Igual que el anterior pero marcamos cuantos caracteres queremos coger:
print_r(str_split($string, 4));
//Saber tamaño
echo strlen($string) . CONSTANTE;
