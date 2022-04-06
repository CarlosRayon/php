<!DOCTYPE html>
<!--
Para subir ficheros:
    -Se guardan en array global $_FILES
    -Por defecto se almacenan en un directorio temporal creado por el servidor
    -RECUERDA!!!Obligatorio poner metodo post sino no se envian
    -RECUERDA!!!Poner el formulario enctype="multipart/form-data
    -RECUERDA!!!Poner en el name del imput los corchetes[]
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Subir ficheros</title>
    <?php
    if (isset($_FILES['archivos'])) { //Si la variable file esta definida
        $totalFile = count($_FILES["archivos"]["tmp_name"]); //Obtengo el total de archivos guardados

        for ($i = 0; $i < $totalFile; $i++) { //Recorremos el array $_FILE
            $prefijo = substr(md5(uniqid(rand())), 0, 6); //  generar un pefijo aleatorio (OPCONAL)

            if ($_FILES['archivos']['error'][$i] > 0) { //Comprobamos que no tengamos errores
                echo "Error: " . $_FILES['archivos']['error'][$i] . " Seleccione algun archivo<br>";
            } else { //Si todo va bien

                /* Podemos
                     * -Mostrar datos
                     * -Validar que los datos sean correcto
                     * -Guardar los datos
                     */

                /* Mostramos datos
                      echo $_FILES['archivos']['name'][$i];
                      echo $_FILES['archivos']['type'][$i];
                     */

                /* Validamos los datos */
                if ($_FILES['archivos']['size'][$i] > 0) {
                    if ($_FILES['archivos']['size'][$i] > 5000) { // tamaño aproximado de 5Mb
                        echo "<p>No se pueden subir los ficheros de mas de 5 Mb.</p>";
                        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=paso3.php">';
                        exit();
                    } else { //Tiene que estar creado en el servidor la carpeta "ficheros" en el servidor web
                        if (!move_uploaded_file($_FILES["archivos"]["tmp_name"][$i], "ficheros/" . $prefijo . $_FILES["archivos"]["name"][$i])) {

                            echo "<h1>No se ha podido subir el archivo " . $_FILES['archivos']['name'][$i] . "</h1>";
                        }
                    }
                }
            }
        }
    }
    ?>



</head>

<body>
    <form id="formulario" action="02_multiples_ficheros.php" method="post" enctype="multipart/form-data">
        <p>Subir Ficheros: <input type="file" name="archivos[]" value="Enviar documento(varios)"></p>
        <p>Subir Ficheros: <input type="file" name="archivos[]" value="Enviar documento(varios)"></p>
        <p>Subir Ficheros: <input type="file" name="archivos[]" value="Enviar documento(varios)"></p>
        <input type="submit" value="CONFIRMAR">
    </form>
</body>

</html>

<!-- EJEMPLO EN UNA FUNCION
function subirFicheros() { //manda los ficheros al servidor
    if (isset($_FILES['archivos'])) {
        $totFile = count($_FILES["archivos"]["tmp_name"]);
        for ($i = 0; $i < $totFile; $i++) {
            $prefijo = substr(md5(uniqid(rand())), 0, 6); //    --------- generar un pefijo aleatorio ----------------
            if ($_FILES['archivos']['size'][$i] > 0) {
                if ($_FILES['archivos']['size'][$i] > 5000) { //  ---------- tamaño aproximado de 5Mb
                    echo "<p>No se pueden subir los ficheros de mas de 5 Mb.</p>";
                    echo '<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=paso3.php">';
                    exit();
                } else { //Tiene que estar creado en el servidor la carpeta "ficheros" en el servidor web
                    if (!move_uploaded_file($_FILES["archivos"]["tmp_name"][$i], "ficheros/" . $prefijo . $_FILES["archivos"]["name"][$i])) {

                        echo "<h1>No se ha podido subir el archivo " . $_FILES['archivos']['name'][$i] . "</h1>";
                    }
                }
            }
        }
    }
}
-->
