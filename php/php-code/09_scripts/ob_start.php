<?php

/* Ejemplo  */
ob_start();
foreach ($stockFilename as $stockFile) {
    $result = ftp_get($conn_id, "php://output", $stockFile, FTP_BINARY);
}
$data = ob_get_contents();
ob_end_clean();


/* otro ejemplo */

ob_start();

require_once dirname(__FILE__) . '/../connections/conexion.php';

/* Selección de cesta que van a ser afectadas */
$stmt = $db->prepare("SELECT Id FROM cesta WHERE DATEDIFF( NOW( ) , fecha ) >2 AND id_venta =0");
$stmt->execute();
$cestas_update = $stmt->fetchAll(PDO::FETCH_OBJ);

/* Update de cestas */
$stmt = $db->prepare("UPDATE cesta SET id_venta = 99999999 WHERE DATEDIFF( NOW( ) , fecha ) >2 AND id_venta =0");
$stmt->execute();
$num_cestas_upadate = $stmt->num_rows;

/* Data */
echo 'NUMERO CESTAS AFECTADAS: ' . $num_cestas_upadate . '<br><br>';
echo 'LISTADO CESTAS AFECTADAS: <br>
<pre>';
var_dump($cestas_update);
echo '</pre>';

/* Genero el logs del script */
$content = ob_get_contents();

$folder = dirname(__FILE__) . "/logs_update/" . date("Ymd");
mkdir($folder, 0777);
$log_file = fopen($folder . '/log_update_date' . date("Ymd_His") . '.txt', 'w');
fwrite($log_file, $content);
fclose($log_file);

ob_end_flush();
