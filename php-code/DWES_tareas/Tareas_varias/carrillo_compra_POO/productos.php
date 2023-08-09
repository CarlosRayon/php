<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Tarea Unidad 5 (Parte 1)</title>       
    </head>
    <body>        

        <h1>Listado de productos:</h1>
        <hr/>
        <?php
            require_once 'include/CestaCompra.php';
        require_once 'include/DB.php';
            echo"<h3><img src='cesta.png'/>Cesta de la compra: </h3><br/>";
            // Recuperamos la cesta de la compra o creamos una nueva
            $cesta = CestaCompra::carga_cesta();
            // Para vaciar la cesta
        if (isset($_POST['vaciar'])) {
            unset($_SESSION['cesta']);
            $cesta = new CestaCompra();
        }
            // Para añadir un producto a la cesta
        if (isset($_POST['aniadir'])) {
            $cesta->nuevo_articulo($_POST['codigo']);
            $cesta->guarda_cesta();
        }
            //Si pulsamos el botón de pagar
        if (isset($_POST['pagar'])) {
            header("Location: cesta.php");
        }
            //Mostramos el contenido en todo momento
            $cesta->muestra();
            
        ?>
        <form action='productos.php' method='post' >
            <input type="submit" name="vaciar" value="Vaciar Cesta"></input>
            <input type="submit" name="pagar" value="Comprar"></input>                
        </form>
        <hr/>            
        <?php
            require_once 'include/DB.php';
            $resultado = DB::obtieneProductos();
        foreach ($resultado as $prod) {
            echo "<form action='productos.php' method='post'>";
            echo "<input type='submit' name='aniadir' value='Añadir'></input>";
            echo "<input type='hidden' name='codigo' value='" . $prod->getcodigo() . "'></input>";
            echo "<label>" . $prod->getnombrecorto() . ": " . $prod->getPVP() . "</label><br/>";
            echo "</form>";
        }
        ?>         

    </body>
</html>


