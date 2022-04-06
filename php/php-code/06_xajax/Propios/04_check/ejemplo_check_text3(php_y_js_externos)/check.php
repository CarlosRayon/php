<?php

//incluímos la clase ajax 
//require ('../xajax/xajax_core/xajax.inc.php');

//------------------------------------------

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
   
    //tenemos que devolver la instanciación del objeto xajaxResponse 
    return $respuesta; 
} 


function validar_edad($entrada)
{
    if ($entrada >= 18) {
        $salida2 = "Es mayor de edad";
    } else {
        $salida2 = "Debe ser mayor de edad";
    }
   
    //instanciamos el objeto para generar la respuesta con ajax 
    $respuesta2 = new xajaxResponse(); 
    //escribimos en la capa con id="respuesta" el texto que aparece en $salida 
    $respuesta2->assign("respuesta2", "innerHTML", $salida2); 
   
    //tenemos que devolver la instanciación del objeto xajaxResponse 
    return $respuesta2; 
} 





?>
