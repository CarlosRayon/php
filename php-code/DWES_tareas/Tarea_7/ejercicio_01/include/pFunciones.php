<?php

/*
  Archivo donde defino las funciones php que luego usare con JS
 */

//Instanciamos el objeto xajax
$xajax = new xajax();

//$xajax->setFlag('debug', true); //Opcional. Configuracion del debug de xajax No lo activo porque en esta version que tengo me marca error
//Creamos una funcion para llamar por medio de ajax (Hara funciones del lado servidor)

function mostrarDatos($contador)
{
    
    $datos = BaseDatos::obtieneMatricula($contador);//Obtengo los datos de la consulta
    
    if (!empty($datos)) {//Si tenemos datos..

        $salida = $datos[0]["alumno"];//Los asignamos a variables...
        

        $tablaModulos = "<table border='1'>"; //Creo la tabla
        $tablaModulos .= "<thead>";
        $tablaModulos .= "<tr><th>Contador</th><th>Modulo</th></tr>";
        $tablaModulos .= "<thead>";

        $tablaModulos .= "<tbody>";

        for ($i = 0; $i < count($datos); $i++) {            
            $tablaModulos .= "<tr>";            
            if ($i % 2 == 0) {
                
                $tablaModulos .= "<td id='impares' >". $contador ."</td>";
                $tablaModulos .= "<td id='impares'>" . $datos[$i]["modulo"] . "</td>";
                $tablaModulos .= "<td><input type=\"button\" id=\"" .$datos[$i]["modulo"] . "\" name=\"dato\" value=\"Anular\" onclick=\"anular(' ".$datos[$i]["modulo"] . "',".$contador.")\"></td>";
                
            } else {
                
                $tablaModulos .= "<td id='pares'>".$contador."</td>";
                $tablaModulos .= "<td id='pares'>" . $datos[$i]["modulo"] . "</td>";
                $tablaModulos .= "<td><input type=\"button\" id=\"" .$datos[$i]["modulo"] . "\" name=\"dato\" value=\"Anular\" onclick=\"anular(' ".$datos[$i]["modulo"] ."',".$contador.")\"></td>";
            }
            $tablaModulos .= "</tr>";
        }

        $tablaModulos .= "</tbody>";
        $tablaModulos .= "</table>";
        
        $modulos = $tablaModulos;//a otra variables
        
        //
    } else {

        $salida = "No existe el alumno";
        $modulos = "Sin modulos";
    }

    //Instanciamos el objeto que genera la respuesta
    $respuesta = new xajaxResponse();

    //Asignamos las variables a los diferentes elementos para que se cargen dinamicamente
    $respuesta->assign("datosalumno", "innerHTML", $salida);
    $respuesta->assign("modulos", "innerHTML", $modulos);
    $respuesta->clear("mensajes", "innerHTML");
   
    

    return $respuesta;
}

//Asignamos la funcion creada al objeto xajax que creamos al principio
$xajax->registerFunction("mostrarDatos");


function anular($modulo,$contador)
{
    $salida= BaseDatos::anular($modulo, $contador);
    
    //$salida=$modulo ." " .  $contador;
    
    //    if($filasAfectadas===0)
    //    {
    //        $salida="No se ha produccido ningun cambio¿¿?¿?";
    //    }
    //    else{
    //        
    //        $salida="Se ha borrado con exito el modulo " . $modulo;
    //    }
     
    $respuesta= new xajaxResponse(); 
    
    $respuesta->assign("mensajes", "innerHTML", $salida);
    
    return $respuesta;
    
    
}

$xajax->registerFunction("anular");


//Antes de enviar el contenido a la pagina objeto xajax tiene que procesar cualquier petición RECUERDA!!!
$xajax->processRequest();
