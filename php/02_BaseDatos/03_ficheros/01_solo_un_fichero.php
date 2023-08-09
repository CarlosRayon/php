<!DOCTYPE html>
<!--
/*
Para subir ficheros:
    -Se guardan en array global $_FILES
    -Por defecto se almacenan en un directorio temporal creado por el servidor
    -RECUERDA!!!Obligatorio poner metodo post sino no se envian
    -RECUERDA!!!Poner el formulario enctype="multipart/form-data

-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Subir ficheros</title>
    <?php
    if (isset($_FILES['archivo'])) { //Compruebo que la variable archivos este definida
        if ($_FILES['archivo']['error'] > 0) { //Comprobamos que no tengamos errores
            echo "Error: " . $_FILES['archivo']['error'] . "<br>";
        } else {

            echo ($_FILES['archivo']['name']); //Nos da el nombre
            echo ($_FILES['archivo']['type']); //Nos da el tipo
            echo ($_FILES['archivo']['size']); //Nos da el tamaño
            echo ($_FILES['archivo']['tmp_name']); //Nos da el nombre temporal
            echo ($_FILES['archivo']['error']);    //Nos da codigo de error si no se puede subir  (si no subimos da error 04)

            /* Si queremos guardar el archivo en algun lugar (Antes podemos comprobar que los datos(tamaño, tipo archivo)sean correctos */
            $prefijo = substr(md5(uniqid(rand())), 0, 6); //generar un pefijo aleatorio (OPCIONAL)
            //move_uploaded_file($_FILES['archivo']['tmp_name'], "dondeGuardarlos/" . $prefijo . $_FILES["archivo"]["name"]


            //Mejor comprobamos el guardado
            if (!move_uploaded_file($_FILES['archivo']['tmp_name'], "dondeGuardarlos/" . $prefijo . $_FILES["archivo"]["name"])) {

                echo "<h1>No se ha podido subir el archivo " . $_FILES['archivo']['name'][$i] . "</h1>";
            }
        }
    }
    ?>




</head>

<body>
    <form id="formulario" action="01_solo_un_fichero.php" method="post" enctype="multipart/form-data">
        <p>Subir Ficheros: <input type="file" name="archivo" value="Enviar documento(uno solo)"></p>
        <input type="submit" value="CONFIRMAR">
    </form>
</body>

</html>
