<?php
die('Bloqueado para evitar repetición de datos en la inserción');
require_once 'connections/conexion.php';

/* Datos */
$stmt = $db->prepare('SELECT * FROM usuarios_provisional');
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);

try {
    $db->beginTransaction();

    $contador = 0;
    /* Inserto */
    foreach ($usuarios as $usuario) {

        $stmt = $db->prepare("INSERT INTO usuarios (nombre, email, pass, activado)  VALUES (:nombre, :email, :pass, :activado)");
        $stmt->execute(
            [
                ':nombre' => $usuario->nombre,
                ':email' => $usuario->email,
                ':pass' => sha1($usuario->pass),
                ':activado' => 1
            ]
        );
        $contador += $stmt->rowCount();
    }

    $db->commit();
    die('Ok Nº insertados ' . $contador);
} catch (PDOException $ex) {
    $db->rollBack();
    die('Error ' . $ex->getMessage());
}
