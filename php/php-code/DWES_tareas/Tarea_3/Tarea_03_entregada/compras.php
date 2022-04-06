<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //Creamos la conexion y capturamos las variables que vamos a usar
        require 'conexion.php';

        //Guardo los datos pasados por el formulario a varibles
        if(isset($_POST["provision"]) || isset($_POST["hacerpedido"])) {
             $codigo = $_POST["cod"];
             $unidades = $_POST["unidades"];
             $codigoTienda = $_POST["codigotienda"];
             $nombreTienda = $_POST["nombretienda"];
        }
      
      
        ?>

        <header>
            <h1>Datos de aprovisionamiento:</h1>
        </header>

        <?php
        //Si no hay errores mostramos los datos
        if (!isset($error)) {
            echo $nombreTienda;
            echo "<p>Producto seleccionado $codigo </p>";
            echo "<p>Tienda $codigoTienda</p>";
            //Creamos el formulario
            echo "<form id='formulario' action='" . $_SERVER['PHP_SELF'] . "' method='post'>";
            echo "<p>Unidades a adquirir <input type='number' name='unidadessuma' value='1' min='0' max='100'/></p>";
            date_default_timezone_set('Europe/Madrid'); //defino la franja horaria
            echo "<p>Fecha del pedido " . date('m/d/y') . "</p>";
            
            //Nos volvemos a mandar los valores para que al pulsar los botones no nos de error         
            echo "<input type='hidden' name='cod' value='$codigo'/>";
            echo "<input type='hidden' name='codigotienda' value='$codigoTienda'/>";
            echo "<input type='hidden' name='unidades' value='$unidades'/>";
            echo "<input type='hidden' name='nombretienda' value='$nombreTienda'/>";

            echo '<p>
            <input type="submit" name="hacerpedido" value="Hacer pedido">
            <input type="submit" name="cancelar" value="Cancelar">
                </p>';

            //Si hemos pulsado el boton hacer pedido y tenemos unidades que sumar
            if (isset($_POST["hacerpedido"]) && isset($_POST["unidades"])) {
                //Iniciamos la transacion
                $conexion->beginTransaction();

                //hacemos una consulta para obtener las unidades originales y poder sumarle las nuestras
                $query3 = "SELECT unidades FROM stock WHERE tienda=$codigoTienda AND producto='$codigo'";
                $resultadoQuery3 = $conexion->query($query3);
                $row3 = $resultadoQuery3->fetch();
                //Creamos la consulta de modificacion
                $query4 = "UPDATE stock SET unidades= $unidades+$row3[0] WHERE tienda=$codigoTienda AND producto='$codigo'";

                if ($conexion->query($query3) !== 0)//El valor de la consulta no puede ser 0. No actualiza nada
                 {
                    //Si todo va bien actualizamos
                    $conexion->commit();
                    echo "<p>ACTUALIZADO</p>";
                    
                    // si no revertimos los cambios
                } else
                {
                    $conexion->rollback();
                    echo "<p>NO SE PUEDE ACTUALIZAR</p>";
                }
                // Liberamos la base de datos
                unset($conexion);
            } else if (isset($_POST["cancelar"])) {
                echo "Se ha pulsado cancelar";
            }
        }
        ?>
        <p><a href="listado.php">Mostrar historico</a></p>

    </body>
</html>
