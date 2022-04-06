<?php 
//inclu�mos la clase ajax 
require '../xajax/xajax_core/xajax.inc.php';
//incluimos las funciones php
require 'check.php';

//instanciamos el objeto de la clase xajax 
$xajax = new xajax(); 
//$xajax->setFlag('debug', true);

//asociamos la funci�n creada anteriormente al objeto xajax 
$xajax->register(XAJAX_FUNCTION, "si_no");  
$xajax->register(XAJAX_FUNCTION, "validar_edad"); 

//El objeto xajax tiene que procesar cualquier petici�n 
$xajax->processRequest(); //poner esta l�nea solo al final de todas las funciones ****


?> 

<html> 
<head> 
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
   <META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=ISO-8859-1"> 
   <title>Checkbox, Text</title> 
   <?php
    //En el <head> indicamos al objeto xajax se encargue de generar el javascript necesario 
    $xajax->printJavascript("../xajax");
    ?> 
</head> 

<body> 
<div id="respuesta"></div> 
<form name="formulario"> 
    <input type="checkbox" name="si" value="1" onclick="si_no(document.formulario.si.checked)"> 
    <p>Edad:</p>
    <input type="text" name="edad" id="edad" onblur="validar_edad(document.formulario.edad.value)"><div id="respuesta2"></div><!-- quitamos xajax de las funciones -->
</form> 
<script src="script.js" type="text/javascript"></script>
 
      
</body> 
</html>
