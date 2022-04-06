<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset="utf-8 >
        <title>Gestion</title>


        <?php
        $nombre = "";
        $usuarios = array(
            array('Nombre' => 'nombre',
                'Telefono' => 'telefono'
        ));

        if (isset($_POST["alta"])) {

            $nombre = $_POST["nombre"];
            $telefono = $_POST["telefono"];
            
            
            
        } elseif (isset($_POST["baja"])) {
            
            $nombre = $_POST["nombre"];
            $telefono = $_POST["telefono"];
            
            
        } elseif (isset($_POST["prefijo"])) {

            $nombre = $_POST["nombre"];
            $telefono = $_POST["telefono"];
        }
        ?>

    </head>

    <body>


        <div align="center">

            <form action="gestion.php" method="post" name="formulario"></p>
                <p>   nombre:<input type="text" name="nombre" placeholder="introducir nombre">
                <p>telefono:<input type="text" name="telefono" placeholder="introducir telefono"></p>

                <p>
                    <input type="submit" name="alta" value="alta">
                    <input type="submit" name="baja" value="baja">
                    <input type="submit" name="prefijo" value="prefijo">
                </p>
            </form> 


<?php
foreach ($usuarios as $key => $value) {
    foreach ($value as $key => $value) {

        echo " $key  $value";
        echo "<br>";
    }
}
?>





        </div>






    </div>







</body>


</html>