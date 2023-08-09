<?php

/*
  Archivo con funciones php que las pasaremos a xajax
 */

$xajax = new xajax();

//$xajax->setFlag('debug', true); //Opcional. Configuracion del debug de xajax no lo habilito por que en mi version este formato da error
//Creamos las funciones del lado servidor

function procesarFormulario($form_entrada)
{

    $variableVerifacion = true;

    $fmCodigo = $form_entrada["codigo"];
    $fmNombre = $form_entrada["nombre"];
    $fmHoras = $form_entrada["horas"];
    $fmCurso = $form_entrada["curso"];
    $fmPlaza = $form_entrada["plazas"];
    $fmCiclo = $form_entrada["ciclo"];

    //Verifico el codigo introduccido   
    if (empty($fmCodigo)) {
        $codigo = "Campo codigo vacio introducir datos";
        $variableVerifacion = false;
    } else if (!existeCodigo(strtoupper($fmCodigo))) {
        $codigo = "Error el codigo " . strtoupper($fmCodigo) . " ya existe en la base datos";
        $variableVerifacion = false;
    } else {
        $codigo = "Dato correcto";
    }


    //Verifico el nombre pasado
    if (empty($fmNombre)) {
        $nombre = "Nombre vacio. Introducir datos";
        $variableVerifacion = false;
    } else if (!verificarNombre($fmNombre)) {
        $nombre = "Nombre demasiado largo";
        $variableVerifacion = false;
    } else {
        $nombre = "Nombre correcto";
    }


    //Verifico las horas
    if (empty($fmHoras)) {
        $horas = "Horas vacias, introducir datos";
        $variableVerifacion = false;
    } else if (verificarHoras($fmHoras)) {
        $horas = "Demasiadas horas";
        $variableVerifacion = false;
    } else {

        $horas = "horas correctas";
    }

    //Verifico el curso pasado
    if (verificarCurso($fmCurso)) {
        $curso = "Curso correcto";
    } else {
        $curso = "Curso incorrecto debe ser 1 o 2";
        $variableVerifacion = false;
    }

    //Verifico las plazas
    if (empty($fmPlaza)) {
        $plazas = "Campo plazas vacio";
        $variableVerifacion = false;
    } else if (!verificarPlazas($fmPlaza)) {
        $plazas = "Plaza incorrectas maximo 30";
        $variableVerifacion = false;
    } else {
        $plazas = "Plaza correctas";
    }

    $modulos = "";
    //Verifico el ciclo
    if (empty($fmCiclo)) {
        $ciclo = "Campo ciclo vacio";
        $variableVerifacion = false;
    } else if (strtoupper($fmCiclo) === "COM") {
        $ciclo = "El ciclo no puede ser COM";
        $variableVerifacion = false;
    } else if (!existeElCiclo(strtoupper($fmCiclo))) {
        $ciclo = "El ciclo no existe en la base datos";
        $variableVerifacion = false;
    } else {
        $ciclo = "Ciclo correcto";
        $modulos = modulosCiclo(strtoupper($fmCiclo));
    }


    //Si todas las verificaciones son correctas procedemos a ingresar el modulo en la base de datos
    if ($variableVerifacion) {

        insertar($fmCodigo, $fmNombre, $fmHoras, $fmCurso, $fmPlaza, $fmCiclo);
        $error = "Modulo insertado correctamente";
        $modulos = modulosCiclo(strtoupper($fmCiclo));
        $codigo = "";
        $nombre = "";
        $horas = "";
        $plazas = "";
        $curso = "";
              
    } else {

        $error = "No se puede insertar algun campo no esta bien";
    }

    //Instanciamos el objeto que genera la respuesta
    $respuesta = new xajaxResponse();

    //A que elemento queremos asignar la respuesta de salida
    $respuesta->assign("mscodigo", "innerHTML", $codigo);
    $respuesta->assign("msnombre", "innerHTML", $nombre);
    $respuesta->assign("mshoras", "innerHTML", $horas);
    $respuesta->assign("mscurso", "innerHTML", $curso);
    $respuesta->assign("msplazas", "innerHTML", $plazas);
    $respuesta->assign("msciclo", "innerHTML", $ciclo);
    $respuesta->assign("modulos", "innerHTML", $modulos);
    $respuesta->assign("error", "innerHTML", $error);

    return $respuesta;
}

//registramos la función creada anteriormente al objeto xajax
$xajax->registerFunction("procesarFormulario");

//Funcion para validar el codigo introduccido
function existeCodigo($codigo)
{

    $codModulos = BaseDatos::obtenerCodigo();

    //Para comprobar si existe el valor
    foreach ($codModulos as $value) {
        if (in_array($codigo, $value)) {
            return false;
        }
    }
    return true;
}

//Funcion para validar el codigo introduccido
function verificarNombre($nombre)
{

    if (strlen($nombre) < 50 && $nombre != "") {

        return true;
    }
    return false;
}

//Funcion para verificar las horas introduccidas
function verificarHoras($horas)
{

    $horasMaximas = BaseDatos::maximoHoras();

    if ($horas > $horasMaximas[0]) {
        return true;
    }
    return false;
}

//Funcion para verificar curso
function verificarCurso($curso)
{

    if ($curso > 0 && $curso < 3) {
        return true;
    } else {
        return false;
    }
}

//Funcion para verificar las plazas
function verificarPlazas($plazas)
{

    if ($plazas > 1 && $plazas < 31) {
        return true;
    }

    return false;
}

function modulosCiclo($ciclo)
{

    $modulosDelCiclo = BaseDatos::verModulosCiclo($ciclo);

    $listaModulos = "<h3>El ciclo " . $ciclo . " tiene los siguientes modulos</h3><ul>";

    foreach ($modulosDelCiclo as $value) {
        $listaModulos .= "<li>Nombre: " . $value["nombre"] . " </li>";
    }

    $listaModulos .= "</ul>";
    return $listaModulos;
}

//Funcion para verificar que el ciclo exista
function existeElCiclo($ciclo)
{
    $ciclosDisponibles = BaseDatos::existeCiclo();
    foreach ($ciclosDisponibles as $value) {
        if (in_array($ciclo, $value)) {
            return true;
        }
    }
    return false;
}

//Funcion para insertar el modulo en la base de datos
function insertar($cod, $nombre, $horas, $curso, $plazas, $ciclo)
{

    $modulo = new Modulo($cod, $nombre, $horas, $curso, $plazas, $ciclo);
    return BaseDatos::insertarModulo($modulo);
}


//Antes de enviar el contenido a la pagina objeto xajax tiene que procesar cualquier petición 
$xajax->processRequest();
