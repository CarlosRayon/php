<?php 
//inclu�mos la clase ajax 
require 'xajax/xajax_core/xajax.inc.php';

//instanciamos el objeto de la clase xajax 
$xajax = new xajax(); 
//$xajax->setFlag('debug', true);

function si_no($entrada)
{ 
    if ($entrada=="true") { 
        $salida = "Marcado"; 
    }else{ 
        $salida = "No marcado"; 
    } 

    //instanciamos el objeto para generar la respuesta con ajax 
    $respuesta = new xajaxResponse(); 
    //escribimos en la capa con id="respuesta" el texto que aparece en $salida 
    $respuesta->assign("respuesta", "innerHTML", $salida); 
   
    //tenemos que devolver la instanciaci�n del objeto xajaxResponse 
    return $respuesta; 
} 

//asociamos la funci�n creada anteriormente al objeto xajax 
$xajax->register(XAJAX_FUNCTION, "si_no"); 

//El objeto xajax tiene que procesar cualquier petici�n 
$xajax->processRequest();
?> 

<html> 
<head> 
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
   <META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=ISO-8859-1"> 
   <title>Si / No en Ajax</title> 
   <?php
    //En el <head> indicamos al objeto xajax se encargue de generar el javascript necesario 
    $xajax->printJavascript("../xajax");
    ?> 
</head> 

<body> 
<div id="respuesta"></div> 
<form name="formulario"> 
<input type="checkbox" name="si" value="1" onclick="xajax_si_no(document.formulario.si.checked)"> 
</form> 

 
 <script type="text/javascript"> 
   xajax_si_no(document.formulario.si.checked);
  
   </script>   
   
   
</body> 
</html>
