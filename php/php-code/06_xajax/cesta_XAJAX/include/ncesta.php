<?php
/**
 * Desarrollo Web en Entorno Servidor
 * Aplicaciones web dinámicas: PHP y Javascript
 * Tarea: Cesta de la compra con Xajax: fcesta.php
 */

// Incluimos la librería Xajax


require_once '../xajax/xajax_core/xajax.inc.php';
require_once 'DB.php';
require_once 'CestaCompra.php';

// Creamos el objeto xajax
$xajax = new xajax();

// Registramos las funciones que vamos a llamar desde JavaScript
$xajax->register(XAJAX_FUNCTION, "inicializaCesta");
$xajax->register(XAJAX_FUNCTION, "vaciaCesta");
$xajax->register(XAJAX_FUNCTION, "nuevoProducto");

// El método processRequest procesa las peticiones que llegan a la página
// Debe ser llamado antes del código HTML
$xajax->processRequest();

function inicializaCesta()
{
    session_start();
    $cesta = CestaCompra::carga_cesta();

    return muestraCesta($cesta);
}

function vaciaCesta()
{
    session_start();
    unset($_SESSION['cesta']);
    //$cesta = new CestaCompra();
    sleep(2);
    $respuesta = new xajaxResponse();
    $respuesta->clear("ncesta", "innerHTML");
    $respuesta->assign("bvaciar", "value", "Vaciar Cesta");
    $respuesta->assign("bcomprar", "disabled", true);
    return $respuesta;
}

function nuevoProducto($cod)
{
    session_start();
    $cesta = CestaCompra::carga_cesta();    
    $cesta->nuevo_articulo($cod);
    $cesta->guarda_cesta();

    return muestraCesta($cesta);
}

function muestraCesta($cesta)
{
    $respuesta = new xajaxResponse();

    $respuesta->clear("ncesta", "innerHTML");
    if ($cesta->vacia()) {
        $respuesta->assign("ncesta", "innerHTML", "<p>Cest a vacía</p>");
        $respuesta->assign("bvaciar", "disabled", true);
        $respuesta->assign("bcomprar", "disabled", true);
    }
    else {
        $html_productos = "";
        foreach ($cesta->get_productos() as $producto) {
            $html_productos .= "<p>" . $producto->getcodigo() . "</p>";
        }
        $respuesta->assign("ncesta", "innerHTML", $html_productos);    
        $respuesta->assign("bvaciar", "disabled", false);
        $respuesta->assign("bcomprar", "disabled", false);
    }
    
    return $respuesta;
}
?>

