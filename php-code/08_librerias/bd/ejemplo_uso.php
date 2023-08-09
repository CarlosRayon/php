<?php

//Incluimos la libreria
require_once 'libphp/bd.php';

/* -------------------------------------------------------------------
        EJEMPLO DE USO DE UN SELECT NORMAL
----------------------------------------------------------------------*/

/*SELECT */
/* Preparamos la consulta */
$sql = "SELECT equipos.id, equipos.nombre, imagenes.imagen FROM equipos
        INNER JOIN imagenes ON equipos.Id = imagenes.id_equipo";

/* Ejecutamos la consulta */

$stm = DB::ejecutarSQL($sql, null);

/* INSERT */
$sql = "INSERT INTO usuario (nombre) VALUES ('test')";
DB::ejecutarSQL($sql, null);


/* -------------- Con parametros --------------*/

/* SELECT */
$sql = "SELECT e.id, e.nombre, e.imagen FROM equipos e WHERE e.id = :id AND e.nombre = :nombre ";
$stm = DB::ejecutarSQL($sql, array(':id' => 123, ':nombre' => 'barcelona'));

/*INSERT*/
$sql = "INSERT INTO usuario (nombre) VALUES (:nombre)";
DB::ejecutarSQL($sql, array(':nombre' => 'Carlos'));



/* ------DIFERENTES FORMAS DE GUARDAR LOS DATOS -----------------*/

//Solo la primer fila. (Util para un solo resultado)
$equipos = $stm->fetch(PDO::FETCH_ASSOC);

//Guardamos los datos a la vez (Todo de golpe. Si hay mucho dato se puede producir un efecto botella.)
$equipos = $stm->fetchAll(PDO::FETCH_ASSOC);

//Guardar los datos uno a uno (Si hay mucho datos que recuperar es la mejor opcion. Evitamos cuello botella)
$arrayConsulta = array();
while ($filaArray = $stmt->fetch(PDO::FETCH_ASSOC)) { //usamos el método fetch() de PDOstmt
    array_push($arrayConsulta, $filaArray); //guardamos los datos en un array
}




/* -------------------------------------------------------------------
        EJEMPLO DE USO DE UNA TRANSACCIÓN CON CONSULTAS PREPARADAS
----------------------------------------------------------------------*/

//Comienzo la transacción
$con = DB::transaction();


/*--------INSERT---------------*/
//Preparo la consulta
$sql = "INSERT INTO hilos (idhilo, idtemadepen, iduser, titulohilo, fechahilo) VALUES (NULL, :idtema, :iduser, :titulohilo, :fecha)";

//Ejecuto la transacción
$stm = DB::prepareTransaction($con, $sql, array(":idtema" => $_SESSION['idtema-hidden'], ":iduser" => $usuario->getIdUser(), ":titulohilo" => htmlspecialchars($_POST['titulo-hilo']), ":fecha" => date('y/m/d H:i:s')));

//Validamos la transacción. Si hubiera fallo. rollback y salgo script o hago cualquier cosa.
$afectadas = $stm->rowCount();
if ($afectadas == 0) {
    DB::rollback($con);
    $insertOk = false;
}

/*---------------------SELECT-------------*/

//Preparo la consulta
$sql = "SELECT MAX(idhilo) AS suma FROM hilos";

//Ejecuto la siguiente transacción..
$stm = DB::prepareTransaction($con, $sql, array());

//Validamos la transacción. Si hubiera fallo. rollback y salgo script.
$afectadas = $stm->rowCount();
if ($afectadas == 0) {
    DB::rollback($con);
    $insertOk = false;
}

//Guardo los datos de la ultima transacción.
$idHilo = $stm->fetch(PDO::FETCH_ASSOC);

/*--------------OTRO INSERT  (PUDIERA SER UN UPDATE O LO QUE SEA) ------------------*/

//Preparo la consulta
$sql = "INSERT INTO replies (idreplie, idhilodepend, iduser, contentreplie, fechareplie) VALUES (NULL, :idhilodepend, :iduser, :contentreplie, :fecha)";

//Ejecuto la siguiente transacción
$stm = DB::prepareTransaction($con, $sql, array(":idhilodepend" => $idHilo['suma'], ":iduser" => $usuario->getIdUser(), ":contentreplie" => htmlspecialchars($_POST['text-hilo']), ":fecha" => date('y/m/d H:i:s')));

//Validamos la transacción. Si hubiera fallo. rollback y salgo script.
$afectadas = $stm->rowCount();
if ($afectadas == 0) {
    DB::rollback($con);
    $insertOk =  false;
}


/*--------------FINALIZAMOS LA TRANSACCIÓN SI TODO ES CORRECTO ------------------*/
//Si llegamos aquí es que todo ha sido correcto hacemos commit validando el propio commit.
if (DB::commit($con)) {
    $insertOk = true;
} else {
    $insertOk = false;
}
