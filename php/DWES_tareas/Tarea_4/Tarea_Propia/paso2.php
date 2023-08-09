<?php
session_start();//inicio sesion 
require "./arrayModulos.php";//incluyo el array

//GUARDO LOS DATOS RECOGIDOS DEL FORMULARIO EN VARIABLES DE SESSION
if (isset($_POST['paso2'])) {//Si he pulsado el boton paso2 (variable definida)
    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['apellido'] = $_POST['apellido'];
    $_SESSION['fechanacimiento'] = $_POST['fechanacimiento'];
    $_SESSION['sexo'] = $_POST['sexo'];
    $_SESSION['dni'] = $_POST['dni'];
    $_SESSION['modulo'] = $_POST['selector'];
}

//PARA CERRAR SESION Y BORRAR LA COOKIE DE LA SESION
if (!empty($_POST['cerrar'])) {//si he pulsado boton cerrar (variable no vacia)
    //elimino las variables de sesion y sus valores
    $_SESSION = array();

    //elimino la cookie del usuario que identificaba a esa sesion, verificando si existia
    if (ini_get("session.use_cookies") == true) {
        $parametros = session_get_cookie_params();
        setcookie(session_name(), '', time() - 99999, $parametros["path"], $parametros["domain"], $parametros["secure"], $parametros["httponly"]);
    }

    //elimino los archivos de sesion del servidor
    session_destroy();
    //session_unset();

    //Redeciono a la pagina paso 1.php 
    header("location:paso1.php");
}

//SI PULSO EL BOTON VOLVER ME REDIRECCIONO AL PASO 1
if (isset($_POST['volver'])) {//si la variable esta definida
    header("location:paso1.php");
}


//SI PULSO EL BOTON TODOS
if (!empty($_POST['todos'])) { //Si la variable NO esta vacia
    $_SESSION['seleccion'] = array();
    foreach ($curso["{$_SESSION['modulo']}"] as $ciclos => $modulos) {
        array_push($_SESSION['seleccion'], $ciclos);
    }
}

//SI PULSO EL BOTON QUITAR
if(!empty($_POST['quitar'])) //Si la variable NO esta vacia
{
    unset($_SESSION['seleccion']); //Borro la variable de session donde guardo los datos
}


//SI PULSO EL BOTON VER
if(isset($_POST['ver']) && !empty($_POST['ciclos']))// si el boton esta definido y tengo algun valor en los checkbox
{
    $_SESSION['seleccion']=$_POST['ciclos'];
}

//SI PULSO EL BOTON SEGUIR
if(isset($_POST['seguir']))//Si he pulsado boton seguir...
{
    if(isset($_SESSION['seleccion']))//...y tengo modulos selecionados...
    {
        header("location:paso3.php");//...sigo al paso 3
      
    }else{
       
        $sindatos=true;     
    }      
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link  rel="stylesheet" type="text/css" href="style/estiloweb.css">
        <title>paso 2</title>
    </head>
    <body>
        <h1>2. Seleccion de los modulos</h1>
        <div id="checkbox">
            <h2>Modulos candidatos</h2>   
            <!--Formulario. En este caso mando los datos a esta misma pagina.-->
            <?php
            echo "<form id='formulariopaso2' action='".$_SERVER['PHP_SELF']."' name'formulariopaso2' method='post'>";
       
            // MUESTRO LOS DATOS DEL ARRAY DE LA POSICION ELEGIDA
                $mostrarCiclos = "";
            foreach ($curso["{$_SESSION['modulo']}"] as $ciclos => $modulos) {
                $mostrarCiclos .= "<label>$ciclos <input type='checkbox' name='ciclos[]' value='$ciclos'></label><br>";
            }
                echo $mostrarCiclos;
            ?>        
                <br>
                <input type="submit" value="VOLVER" name="volver">
                <input type="submit" value="TODOS" name="todos">
                <input type="submit" value="QUITAR" name="quitar">
                <input type="submit" value="VER" name="ver">
                <input type="submit" value="SEGUIR" name="seguir">
            </form>
        </div>      
        <div id="mostrarmodulos">
            <h2>Modulos seleccionados</h2>
            <?php
            //            Imprimo los modulos en pantalla si la variable de seleccion tiene alguno guardado
            if(isset($_SESSION['seleccion'])) {
                foreach ($_SESSION['seleccion'] as $valor) {
                    echo $valor . "<br>";
                }
            }      
            //Para mostra que no se ha seleccionado nada
            if(isset($sindatos)) {
                echo "ATENCION!!!!!Eliga los modulos y pulse VER para seleccionar los modulos."
                . "Pulse TODO para seleccionar todos los modulos";
            }            
            ?>
        </div>
    </body>
</html>
