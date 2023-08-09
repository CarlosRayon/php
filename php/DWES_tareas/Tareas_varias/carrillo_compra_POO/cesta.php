<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Tarea Unidad 5 (parte 1)</title>       
    </head>
    <body>    

        <h1>Cesta de la compra:</h1>
        <hr/>
        <?php
            require_once 'include/CestaCompra.php';
            
            echo"<h3><img src='cesta.png'/>Cesta de la compra: </h3><br/>";
            // Recuperamos la cesta de la compra
            $cesta = CestaCompra::carga_cesta();
        foreach ($cesta->get_productos() as $prod) {
            $prod->getCompleto();
        }
            echo "<hr/>";
            //Mostramos el total
            echo "<p>Coste total: " . $cesta->get_coste() . " Euros</p";
            
        if (isset($_POST['pagar'])) {               
            header("Location: pagar.php");
        }
        if (isset($_POST['desconectar'])) {
            header("Location: logout.php");
        }
        ?>
        <hr/>  
        <form action='cesta.php' method='post' >
            <input type="submit" name="pagar" value="Pagar"></input><br/>
            <input type="submit" name="desconectar" value="Desconectar usuario"></input>                
        </form>     

    </body>
</html>

