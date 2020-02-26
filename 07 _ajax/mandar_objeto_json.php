<?php

/*
  Controlador para las gasolineras
 */
include_once '../../librerias/bd.php';

// Para que el navegador no haga cache (fecha de expiración menor a la actual)
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
//Tipo de contenido que vamos a mandar
header('Content-Type: application/json');

$conexion = new database(); //Conexion base datos por objetos

$arrayConsulta = array(); //Array donde guardar los datos obtenidos bd

try {
    $query = "SELECT * FROM gasolineras";

    $stmt = $conexion->prepare($query);
    $stmt->execute();

    /* Para capturar los datos */
    while ($filaArray = $stmt->fetch(PDO::FETCH_ASSOC)) {//usamos el metodo fetch() de PDOstmt   
        array_push($arrayConsulta, $filaArray); //guardamos los datos en un array       
    }
} catch (Exception $ex) {
    die('Error: ' . $ex->getMessage());
}

echo json_encode($arrayConsulta, JSON_UNESCAPED_UNICODE); //Devolvemos el el array codificado como JSON