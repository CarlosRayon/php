<?php


  $date = new DateTime();
  $dateTwo = new DateTime('2021-7-10');

if($date < $dateTwo) {
    echo 'is minor';
}


  /* Diff https://programacion.net/articulo/calcular_la_diferencia_entre_dos_fechas_con_php_1566 */

  $diff = $date->diff($dateTwo);

  var_dump($diff);

  echo $diff->days;



/* ------- otros -------*/

$fecha_actual = strtotime(date("d-m-Y H:i:00", time()));
$fecha_entrada = strtotime("19-11-2008 21:00:00");

if ($fecha_actual > $fecha_entrada) {
    echo "La fecha actual es mayor a la comparada.";
} else {
    echo "La fecha comparada es igual o menor";
}
