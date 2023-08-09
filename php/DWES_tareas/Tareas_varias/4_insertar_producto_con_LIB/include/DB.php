<?php

require_once 'Producto.php';


class DB
{

    protected static function ejecutaConsulta($sql)
    {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=dwes";
        $usuario = 'dwes';
        $contrasena = 'abc123.';
        $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
        $resultado = null;
        if (isset($dwes)) {
            $resultado = $dwes->query($sql);
        }
        return $resultado;
    }

 


    

    public static function insertar_producto($producto)
    {
        
        $sql1 = "INSERT INTO producto (cod, nombre, nombre_corto, descripcion, PVP, familia) 
			VALUES ('".$producto->getcodigo()."', '".$producto->getnombre()."', '".$producto->getnombrecorto()."', '".$producto->getdescripcion()."','".$producto->getPVP()."', '".$producto->getFamilia()."')";
        $resultado1 = self::ejecutaConsulta($sql1);
        if($resultado1) {
            return "El producto se insertó correctamente"; 
        } else {
            return "Se produjo un error al insertar el producto.";
        }

        
    }


}

?>
