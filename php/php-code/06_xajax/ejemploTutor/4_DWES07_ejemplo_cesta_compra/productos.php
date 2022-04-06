<?php
require_once 'include/DB.php';
require_once 'include/CestaCompra.php';
require_once 'include/xajax_core/xajax.inc.php';

// Creamos el objeto xajax
$xajax = new xajax('include/fcesta.php');

// Registramos las funciones que vamos a llamar desde JavaScript
$xajax->register(XAJAX_FUNCTION, "inicializaCesta");
$xajax->register(XAJAX_FUNCTION, "vaciaCesta");
$xajax->register(XAJAX_FUNCTION, "nuevoProducto");

// Y configuramos la ruta en que se encuentra la carpeta xajax_js
$xajax->configure('javascript URI', './include/');

// Recuperamos la información de la sesión
session_start();
// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) { 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
}

function creaFormularioProductos()
{
    $productos = DB::obtieneProductos();
    foreach ($productos as $p) {
        $cod = "'" . $p->getcodigo() ."'";
        // Capturamos los formularios de añadir productos a la cesta
        print '<p><form id='.$cod.' action="javascript:void(null);" onsubmit="nuevoProducto('.$cod.');">';
        // Metemos ocultos los datos de los productos
        echo "<input type='hidden' name='cod' value='".$p->getcodigo()."'/>";
        echo "<input type='submit' name='enviar' value='Añadir'/>";
        echo $p->getnombrecorto() . ": ";
        echo $p->getPVP() . " euros.";
        echo "</form>";
        echo "</p>";
    }        
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 7 : Aplicaciones web dinámicas: PHP y Javascript -->
<!-- Tarea: Cesta de la compra con Xajax: productos.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Tarea Tema 7: Listado de Productos utilizando Xajax</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
  <!-- Incluimos el código JavaScript necesario -->
  <?php $xajax->printJavascript(); ?>
  <script type="text/javascript" src="fcesta.js"></script>
</head>

<!-- Añadimos código JavaScript para que se muestre la cesta -->
<!--  si el usuario recarga la página -->
<body class="pagproductos" onload="inicializaCesta();">

<div id="contenedor">
  <div id="encabezado">
    <h1>Listado de productos</h1>
  </div>
  <div id="cesta">
      <h3><img src='cesta.png' alt='Cesta' width='24' height='21'> Cesta</h3>
      <hr />
      <!-- Creamos un div para los productos de la cesta -->
      <div id='pcesta'>
      </div>
      <!-- Capturamos la pulsación del botón de vaciar la cesta -->
      <form id='vaciar' action='javascript:void(null);' method='post' onsubmit='vaciaCesta();'>
          <input type='submit' id='bvaciar' name='vaciar' value='Vaciar Cesta' disabled='true' />
      </form>
      <form id='comprar' action='cesta.php' method='post'>
          <input type='submit' id='bcomprar' name='comprar' value='Comprar' disabled='true' />
      </form>
  </div>
  <div id="productos">
    <?php creaFormularioProductos(); ?>
  </div>
  <br class="divisor" />
  <div id="pie">
    <form action='logoff.php' method='post'>
        <input type='submit' name='desconectar' value='Desconectar usuario <?php echo $_SESSION['usuario']; ?>'/>
    </form>        
  </div>
</div>
</body>
</html>
