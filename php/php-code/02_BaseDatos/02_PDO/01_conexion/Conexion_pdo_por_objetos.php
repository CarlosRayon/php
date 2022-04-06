<?php
/*
  Clase con la conexion a la base de datos en pdo
 */

class database extends PDO
{


    //Variable para la conexion
    private $tipoBaseDatos = "mysql";
    private $servidor = "localhost";
    private $usuario = "root";
    private $pass = "";
    private $database = "gasolineras";

    //Opciones de la conexion
    private $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    public function __construct()
    {
        //Sobreescribo el método constructor de la clase PDO.
        try {;
            parent::__construct($this->tipoBaseDatos . ':host=' . $this->servidor . ';dbname=' . $this->database, $this->usuario, $this->pass, $this->opc);

            //PDO::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cambiamos modo trabajar con las excepcion

        } catch (PDOException $e) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
            exit;
        }
    }
}

//Para usar instanciar un objeto de esta clase
$conexion = new database();
