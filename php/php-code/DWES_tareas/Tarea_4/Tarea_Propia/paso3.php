<?php
session_start(); //Inicio session
require "./arrayModulos.php"; //incluyo el array
//Compruebo las horas totales de los modulos elegidos
$horasCiclo = 0;

foreach ($_SESSION['seleccion'] as $modulo) {
    foreach ($curso['DAW'][$modulo] as $key => $value) {
        if ($key == 'horas') {
            $horasCiclo += $value;
            continue; //evito que me coga el otro valor del array
        }
    }
}
//Si la horas totales pasan de 1000...
if ($horasCiclo > 1000) {
    $mostrarError = "<div id='error'>
                     <p>El numero de horas eleguido superar las 1000</p>
                     <p>Sera redirigido a la pagina anterior para que vuelva a seleccionar modulos</p>       
                     </div>";
    echo $mostrarError;
    header("refresh:5;url=paso2.php");
}



//Si pulso el boton cambiar..
if (isset($_POST['cambiar'])) {
    header("location:paso2.php"); //...vuelvo a la pagina paso.php
}

//Si pulso el boton confirmar
if (isset($_POST['confirmar'])) {

    //Para contar las matriculas  NO ESTA BIEN EMPLEMENTADO EN EL PROGRAMA!!!¿?¿?
    $_SESSION['matriculados'][] = 1;
    echo count($_SESSION['matriculados']);

    //ARCHIVO VIDA LABORAL
    $vidalaboralTamano = $_FILES["vidalaboral"]['size'];
    $vidalaboralTipo = $_FILES["vidalaboral"]['type'];
    $vidalaboralArchivo = $_FILES["vidalaboral"]['name'];
    $vidalaboralPrefijo = substr(md5(uniqid(rand())), 0, 6);
    //ARCHIVO CARGA FAMILIAR
    $cargafamiliarTamano = $_FILES["cargafamiliar"]['size'];
    $cargafamiliarTipo = $_FILES["cargafamiliar"]['type'];
    $cargafamiliarArchivo = $_FILES["cargafamiliar"]['name'];
    $cargafamiliarPrefijo = substr(md5(uniqid(rand())), 0, 6);
    //ARCHIVO EMPADRONAMIENTO
    $empadronamientoTamano = $_FILES["empadronamiento"]['size'];
    $empadronamientoTipo = $_FILES["empadronamiento"]['type'];
    $empadronamientoArchivo = $_FILES["empadronamiento"]['name'];
    $empadronamientoPrefijo = substr(md5(uniqid(rand())), 0, 6);

    if (!empty($vidalaboralArchivo)) {
        if ($vidalaboralTamano > 10000) {                  // ---------- tamaño en bytes --------------------------------
            $status = "ERROR, demasiado grande";
        } else {
            // guardamos el archivo a la carpeta física creada
            $destino = "archivos/" . $vidalaboralPrefijo . "_" . $vidalaboralArchivo;
            if (move_uploaded_file($_FILES['vidalaboral']['tmp_name'], $destino)) {
                $status = "Archivo subido: <b>" . $vidalaboralArchivo . "</b>";
            } else {
                $status = "Error al subir el archivo";
            }
        }
    } else {
        $status = "<div id='errorArchivo'>
                     <p>Falta el fichero de la vida laboral</p>               
                     </div>";
    }
    echo $status . "<br>";
    if (!empty($cargafamiliarArchivo)) {
        if ($cargafamiliarTamano > 10000) {                  // ---------- tamaño en bytes --------------------------------
            $status = "ERROR, demasiado grande";
        } else {
            // guardamos el archivo a la carpeta física creada
            $destino = "archivos/" . $cargafamiliarPrefijo . "_" . $cargafamiliarArchivo;
            if (move_uploaded_file($_FILES['cargafamiliar']['tmp_name'], $destino)) {
                $status = "Archivo subido: <b>" . $cargafamiliarArchivo . "</b>";
            } else {
                $status = "Error al subir el archivo";
            }
        }
    } else {
        $status = "<div id='errorArchivo'>
                     <p>Falta el fichero de la carga carga familiar</p>               
                     </div>";
    }
    echo $status . "<br>";
    if (!empty($empadronamientoArchivo)) {
        if ($empadronamientoTamano > 10000) {                  // ---------- tamaño en bytes --------------------------------
            $status = "ERROR, demasiado grande";
        } else {
            // guardamos el archivo a la carpeta física creada
            $destino = "archivos/" . $empadronamientoPrefijo . "_" . $empadronamientoArchivo;
            if (move_uploaded_file($_FILES['empadronamiento']['tmp_name'], $destino)) {
                $status = "Archivo subido: <b>" . $empadronamientoArchivo . "</b>";
            } else {
                $status = "Error al subir el archivo";
            }
        }
    } else {
        $status = "<div id='errorArchivo'>
                     <p>Falta el fichero del empadronamiento</p>               
                     </div>";
    }
    echo $status . "<br>";

    /* ESTA PARTE NO ESTA BIEN IMPLEMENTADA.
     *  DEBERIA COMPROBAR EL NUMERO DE MATRICULAS DESDE EL ARRAY DE CADA MODULO?¿?¿??¿?
     */
    if (!empty($vidalaboralArchivo) && !empty($empadronamientoArchivo)) {//CONSIDERO QUE ESTO DOS SON OBLIGATORIOS
        session_unset();
        echo "USUARIO REGISTRADO CORRECTAMENTE";
        //Para contar las matriculas  NO ESTA BIEN EMPLEMENTADO EN EL PROGRAMA!!!¿?¿?
        $_SESSION['matriculados'][] = 1;
        echo count($_SESSION['matriculados']);
        header("refresh:2;url=paso1.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link  rel="stylesheet" type="text/css" href="style/estiloweb.css">
        <meta charset="UTF-8">
        <title>Paso 3</title>
    </head>
    <body>
        <h1>Confirmar la matricula</h1>
        <div id="contenido">

            <?php
            $mostrarLista = "<p>Datos Personales: {$_SESSION['nombre']} {$_SESSION['apellido']} {$_SESSION['dni']} </p>";

            $mostrarLista .= "<ul>";
            foreach ($_SESSION['seleccion'] as $modulosEleguidos) {
                $mostrarLista .= "<li> $modulosEleguidos</li>";
            }
            $mostrarLista .= "</ul>";

            echo $mostrarLista;
            echo "<p>Total de horas matriculadas: $horasCiclo</p>";
            ?>

            <form id="formulariopaso3" action="paso3.php" method="post" enctype="multipart/form-data">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">DOCUMENTOS COMUNES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Informe Vida Labora</td>
                            <td><input type="file" name="vidalaboral" value="Enviar documento"></td>  
                        </tr>
                        <tr>
                            <td>Justificante cargar familiares</td>
                            <td><input type="file" name="cargafamiliar"value="Enviar documento"></td>  
                        </tr>
                        <tr>
                            <td>Certificado empadronamiento</td>
                            <td><input type="file" name="empadronamiento" value="Enviar documento"></td>  
                        </tr>
                    </tbody>
                </table>
                <br>


                <input type="submit" name="cambiar" value="CAMBIAR">
                <input type="submit" name="confirmar" value="CONFIRMAR">
                <!--Para direccionar por un boton directamente-->
                <!--<input type="button" name="boton" value="Deprueba" onclick="location='paso2.php'">-->
            </form>
        </div>

    </body>
</html>
