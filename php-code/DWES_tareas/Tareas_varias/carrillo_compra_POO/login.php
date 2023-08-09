<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Tarea Unidad 5 (Parte 1)</title>        
    </head>
    <body>        
        <form action='login.php' method='post'>
            <label>Usuario</label>
            <input type="text" name="name" ></input></br>
            <label>Contraseña</label>
            <input type="text" name="password" ></input></br>
            <input type="submit" name="enviar" value="Enviar"></input>            
        </form>             
        <?php
        require_once 'include/DB.php';
        if (isset($_POST['enviar'])) {
            $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $dsn = "mysql:host=localhost;dbname=dwes";
            $usuario = $_POST['name'];
            $contrasena = $_POST['password'];
            try{    //Usamos los datos de conexión siguientes
                $dwes = new PDO($dsn, 'dwes', 'abc123.', $opc);            
                if ($dwes) {
                    //Para el usuario usaremos los introducidos en el form
                    if (DB::verificaCliente($usuario, $contrasena)) {
                        header("Location: productos.php");
                    } else {
                        echo"<p>Usuario no registrado</p>";
                    }
                }
            }catch(PDOException $p){
                echo "<p>Conexión no establecida</p>";
            }
        }
        ?>
            

            </body>
            </html>