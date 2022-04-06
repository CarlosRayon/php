<?php

 //Archivo con funciones php que las pasaremos a xajax
$xajax = new xajax();

//$xajax->setFlag('debug', true); //Opcional. Configuracion del debug de xajax no lo habilito por que en mi version este formato da error
//// Y configuramos la ruta en que se encuentra la carpeta xajax_js

$xajax->configure('javascript URI', './xajax/');

//Funcion para validar el codigo introduccido
function existeCodigo($codigo)
{
      //Preparamos las respuesta de la funcion xajax
    $respuesta = new xajaxResponse();
    //Definimos las variables de salida como vacias. Evitamos errores por si luego no se definen
    $salida="";
    $codModulos = BaseDatos::obtenerCodigo();
    $control = 2;
    
    //Validamos los datos
    if (empty($codigo)) {
        $control = 0;
    }
    
    foreach ($codModulos as $value) {
        if (in_array(strtoupper($codigo), $value)) {
            $control = 1;
        }
    }
    
    switch ($control) {
    case 0:
        $salida = "Campo vacio";
        break;
        
    case 1:
        $salida = "El codigo " . strtoupper($codigo) . " ya existe";
        break;
        
    case 2:
        $salida = "true";
        /*Ninguna opcion valida para devolver true Si quito la assign Tampoco funciona
        $respuesta->setReturnValue(true);         
         */            
        break;
    }
    
  
    //A que elemento queremos asignar la respuesta de salida
    $respuesta->assign("mscodigo", "innerHTML", $salida);
    return $respuesta;
}


//Funcion para verificar las horas introduccidas
function verificarHoras($horas)
{

    //Definimos las variables de salida como vacias. Evitamos errores por si luego no se definen
    $horasMaximas = "";
    $salida = "";
    $control = 0;
    $horasMaximas = BaseDatos::maximoHoras();

    //Validamos los datos
    if (is_null($horas)) {
        $control = 1;
    }

    if ($horas < $horasMaximas[0]) {
        $control = 2;
    } else {
        $control = 3;
    }

    switch ($control) {
    case 0:
        $salida = "true";
        break;
        
    case 1:
        $salida = "El campo esta vacio";
        break;
        
    case 2:
        $salida = "true";
        break;
        
    case 3:
        $salida = "Demasiadas horas, como maximo " . $horasMaximas[0]; 
        break;
    }

    //Instanciamos el objeto que genera la respuesta
    $respuesta = new xajaxResponse();
    //A que elemento queremos asignar la respuesta de salida
    $respuesta->assign("mshoras", "innerHTML", $salida);
    return $respuesta;
}


//Funcion para verificar el ciclo
function verificarCiclo($ciclo)
{

    //Definimos las variables de salida como vacias. Evitamos errores por si luego no se definen
    $modulos = "";
    $salida = "";
    $control = 2;
    $ciclosDisponibles = BaseDatos::existeCiclo();

    //Validamos los datos
    foreach ($ciclosDisponibles as $value) {
        if (in_array(strtoupper($ciclo), $value)) {
            $control = 0;
        }
    }

    if (empty($ciclo)) {
        $control = 1;
    }
    if (strtoupper($ciclo) === "COM") {
        $control = 3;
    }

    switch ($control) {
    case 0:
        $salida = "true";
        $modulosDelCiclo = BaseDatos::verModulosCiclo($ciclo);
        $listaModulos = "<h3>El ciclo " . $ciclo . " tiene los siguientes modulos</h3><ul>";
        foreach ($modulosDelCiclo as $value) {
            $listaModulos .= "<li>Nombre: " . $value["nombre"] . " </li>";
        }
        $listaModulos .= "</ul>";
        $modulos = $listaModulos;
        break;

    case 1:
        $salida = "El campo esta vacio";
        break;
              
    case 2:
        $salida = "El ciclo no existe en la base datos";
        break;
        
    case 3:
        $salida = "El modulo no puede ser COM";
        break;
    }

    //Instanciamos el objeto que genera la respuesta
    $respuesta = new xajaxResponse();
    //A que elemento queremos asignar la respuesta de salida
    $respuesta->assign("msciclo", "innerHTML", $salida);
    $respuesta->assign("modulos", "innerHTML", $modulos);
    return $respuesta;
}

//Funcion para verificar el nombre
function verificarNombre($nombre)
{
    
     //Definimos las variables de salida como vacias. Evitamos errores por si luego no se definen
    $salida="";
    $control=0;
    
    if (empty($nombre)) {
        $control = 1;
    }
    
    switch ($control) {
    case 0:
        $salida = "true";
        break;
    case 1:
        $salida = "El campo esta vacio";
        break;           
    }
    
    //Instanciamos el objeto que genera la respuesta
    $respuesta = new xajaxResponse();
    $respuesta->assign("msnombre", "innerHTML", $salida);
    return $respuesta;
}

//Funcion para verificar el curso
function verificarCurso($curso)
{
    $salida="";
    $control=0;
    
    if(($curso != 1) && ($curso != 2) ) {
        $control=1;
    }
    
    switch ($control) {
    case 0:
        $salida = "true";
        break;
        
    case 1:
        $salida = "Solo tenemos curso 1 y 2";
        break;      
    }
    
    //Instanciamos el objeto que genera la respuesta
    $respuesta = new xajaxResponse();
    $respuesta->assign("mscurso", "innerHTML", $salida);
    return $respuesta;
}

//Funcion para verificar las plazas
function verificarPlazas($plazas)
{
    $salida="";
    $control=0;
    
    if(($plazas < 1) || ($plazas > 30)) {
        $control=1;
    }
          
    switch ($control) {
    case 0:
        $salida = "true";
        break;
      
    case 1:
        $salida = "Minimo 1 plaza maximo 30";
        break;              
    }
      
    //Instanciamos el objeto que genera la respuesta
    $respuesta = new xajaxResponse();
    $respuesta->assign("msplazas", "innerHTML", $salida);
    return $respuesta;
}

//Funcion para insertar PROBLEMA COMO HAGO PARA LLAMAR A ESTA FUNCION CUANDO TODOS LOS CAMPOS SEAN CORRECTOS
function insertar($codigo,$nombre,$horas,$curso,$plazas,$ciclo)
{
    $confirmacion="";
    
    /*
    //Insertamos el modulo...
    $modulo = new Modulo($codigo, $nombre, $horas, $curso, $plazas, $ciclo);
    $insertado= BaseDatos::insertarModulo($modulo);
    */  
    
    //Instanciamos el objeto que genera la respuesta
    $respuesta = new xajaxResponse();
    $respuesta->assign("confirmacion", "innerHTML", $confirmacion);
    return $respuesta;
}

//Asignamos todas las funciones creadas
$xajax->registerFunction("existeCodigo");
$xajax->registerFunction("verificarHoras");
$xajax->registerFunction("verificarCiclo");
$xajax->registerFunction("verificarNombre");
$xajax->registerFunction("verificarCurso");
$xajax->registerFunction("verificarPlazas");
$xajax->registerFunction("insertar");

//Antes de enviar el contenido a la pagina objeto xajax tiene que procesar cualquier petición 
$xajax->processRequest();
