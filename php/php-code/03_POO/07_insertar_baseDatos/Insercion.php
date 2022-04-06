<?php

class Insercion
{

    //CONEXION
    //Atributos (Seran los necesarios para conectar a la base datos)
    private $servidor = "localhost";
    private $usuario = "root";
    private $pass = "";
    private $baseDatos = "pruebasphppoo";
    private $listado = array(); //En este atributo guardare un array con los resultados

    //Metodo que nos conecte a la base de datos

    public function conectar()
    {
        //Instancion un objeto mysqli que sera el que establezca la conexion con la BD
        $conexion = new mysqli($this->servidor, $this->usuario, $this->pass, $this->baseDatos);
        return $conexion;
    }

    //INSERCION
    public function insertarUsuario($usuario)
    {
        //Le paso un OBJETO usuario
        $sql = "INSERT INTO `usuarios` (`idusuario`, `nombreusuario`, `emailusuario`, `passusuario`) VALUES (?,?,?,?)";
        $conectado = $this->conectar();

        /* verificar conexión */
        if ($conectado->errno) {
            printf("Error de conexión: %s\n", $conectado->error);
            exit();
        }
        $consulta_preparada = $conectado->prepare($sql);
        $consulta_preparada->execute();
        $consulta_preparada->bind_result('isss', $usuario->getIdusuario(), $usuario->getNombreusuario(), $usuario->getEmailusuario(), $usuario->getPassusuario());

        $conectado->close();
    }
}
