<?php

//Clase que me permite establecer conexión y hacer consultas preparadas y transacciones
class DB
{
    //Conectar a la BD y devuelve el objeto PDO $con
    private static function conectar()
    {
        include_once 'config.php';
        try {
            $con = new PDO(DSN, USER, PASS);
            //Cambiamos sus atributos
            $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //Desactivamos la emulación de preparadas
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Establecemos modo error para lanzar excepciones
            return $con;
        } catch (PDOException $e) {
            die('No he podido conectarme a la BD Error: ' . $e->getMessage() . 'Línea: ' . $e->getLine());
        }
    }

    //Recibe la consulta y los parámetros. Devuelve el resultado en formato PDO Statement
    public static function ejecutarSQL($sql, $parametros = null)
    {
        $con = self::conectar();
        $statement = $con->prepare($sql);
        $statement->execute($parametros);
        return $statement;
    }

    // Devolvemos la conexión con una transaction ya creada
    public static function transaction()
    {
        $con = self::conectar();
        $con->beginTransaction();
        return $con;
    }

    public static function prepareTransaction($con, $sql, $parametros)
    {
        $statement = $con->prepare($sql);
        $statement->execute($parametros);
        return $statement;
    }

    //Hacemos un commit de la conexión
    public static function commit($con)
    {
        $con->commit();
        return 1;
    }

    //Hacemos un rollback de una conexión
    public static function rollback($con)
    {
        $con->rollback();
        return 'NO_OK';
    }
}
