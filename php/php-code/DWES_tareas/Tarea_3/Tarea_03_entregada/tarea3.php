<!DOCTYPE html>
<!--
Carlos Rayon Alvarez Tarea 3 DWES 
-->
<html>

    <head>
        <meta charset="UTF-8">
        <title>Listado de todos los productos</title>
        <link rel="stylesheet" type="text/css" href="estilos/style.css" />
    </head>

    <body>

        <?php
        //Incluimos los datos para la conexion mediante el archivo conexion.PHP
        require 'conexion.php';

        //si se pulsa el selector capturamos el codigo
        if (isset($_POST['codi'])) {
            $codigo = $_POST['codi'];
        }
        ?>




        <header>
            <h1>Tarea 3:Listado de todos los productos</h1>
        </header>

        <section>
            <div>

                <form id="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <fieldset>
                        <legend>Tienda</legend>
                        <p>
                            <span>Productos: </span>
                            <select name="codi">
                                <?php
                                //Comprobamos la conexion y si no da error hacemos la consulta.//CAPTURAR EXCECIONES??
                                if (!isset($error)) {
                                    $query = "SELECT cod, nombre_corto FROM producto"; //variable que guarda consulta
                                    $resultadoQuery = $conexion->query($query); //variable guarda resultado consulta
                                }

                                //Con los datos obtenidos generamos el formulario            
                                while ($row = $resultadoQuery->fetch()) 
                                {//pasamos los datos a un array asociativo para manejarlos
                                    //Imprimimos los datos en pantalla
                                    $escribir = "<option value='" . $row['cod'] . "'";

                                    /*
                                      Al pulsar el boton. Si el valor que obtengo del formulario es igual el codigo
                                      le marco como selecionado en el select
                                     */
                                    if (isset($codigo) && $codigo == $row['cod']) {
                                        $escribir .= "selected='true'";
                                    }
                                    
                                    $escribir .= ">" . $row['nombre_corto'] . "</option>";
                                    echo $escribir;
                                }
                                ?>
                            </select> 
                            <input type="submit" name="mostrar" value="Mostrar Tiendas"/>
                        </p>
                    </fieldset>
                </form>
            </div>

            <div>
 <!-- Este formulario se genera de forma dinamica si hemos podido capturar el codigo del formulario anterior-->
                <?php
                if (isset($_POST['codi'])) {
                    //Muestro los datos.
                    echo "<header><h3>Codigo del producto seleccionado: $codigo</h3></header>";
                    echo "<p><b>Relacion de tiendas:</b></p>";
                    echo '<form id="formulario2" action="compras.php" method="post">';
                    
                     //Creo una nueva consulta y la ejecuto guardando el resultado en una variable
                    $query2 = "SELECT cod, nombre, unidades FROM tienda INNER JOIN stock ON tienda.cod=stock.tienda WHERE producto= \"$codigo\";";
                    $resultadoQuery2 = $conexion->query($query2);
     
                    while ($row2 = $resultadoQuery2->fetch())
                      {

                        //Variables para usar en el formulario
                        $codigoTienda=$row2["cod"];
                        $nombreTienda = $row2["nombre"];
                        $cantidadUnidades = $row2["unidades"];

                        //imprimo usando las variables
                        echo "<p>Tienda: $codigoTienda  Nombre: $nombreTienda ---Unidades $cantidadUnidades"
                                . " <input type=\"submit\" name='provision' value=\"Provision\"/></p>";
      
                    }
                    
                   
                    //Paso como valores ocultos los datos que nos interesan
                    /*(Se lo que pasa pero no doy a solucionarlo. Como muestro los datos en un while los valores que
                        paso en el formulario son los ultimos guardados en la variables........)*/
                        echo "<input type='hidden' name='cod' value='$codigo'/>";
                        echo "<input type='hidden' name='unidades' value='$cantidadUnidades'/>";  //Me devuelve siempre 1 ?¿?¿                     
                        echo "<input type='hidden' name='codigotienda' value='$codigoTienda'/>";
                        echo "<input type='hidden' name='nombretienda' value='$nombreTienda'/>";
                   
                }
                ?>

                </form>

            </div>

        </section>

    </body>
</html>
