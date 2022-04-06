<?php
//PARA CERRAR SESION Y BORRAR LA COOKIE DE LA SESION
if (!empty($_POST['cerrar'])) { //si he pulsado boton cerrar (variable no vacia)
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
