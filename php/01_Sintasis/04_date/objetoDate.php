<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>

    <form id="formulario" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        <label for="fecha">Intro fecha</label>
        <input type="date" name="fecha">
        <input type="submit" name="enviar" value="ENVIAR">
    </form>

    <?php
    if (isset($_GET['fecha'])) { //Capturo la fecha RECUERDA!!! Si no defino fecha el valor recogido sera un string vacio ''
        if ($_GET['fecha'] === '') {
            echo "fecha sin definir";
        } else {
            $objetoDate = new DateTime($_GET['fecha']); //Creamos un objeto date con los datos
            echo $objetoDate->format("d-m-Y"); //mostramos los datos RECUERDA!!! Puede ser cualquier formato (mirar pdf Formatos_salida_fechas)
            var_dump(validar_fecha_espanol($objetoDate->format("d/m/Y")));
        }
    }

    /*Con esta funcion validamos que la fecha es correcta en formato español de fecha
                  -Recibe un string en formato español dia-mes-año (El dato de le puedo sacar de un objeto date con ->format()
                  @argument {String} $fecha
                  @return {Boolean}
             */

    function validar_fecha_espanol($fecha)
    {
        $valores = explode('/', $fecha); //RECUERDA!!! Si el formato tiene - cambiamos el primer parametro por el guion
        if (count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])) { //RECUERDA!!! checkdate valida mes-dia-año
            return true;
        }
        return false;
    }
    ?>

</body>

</html>
