<?php

/* 
Fichero del cliente que realiza las llamadas  al servidor
 */

require './MisFunciones.php';

$cliente= new MisFunciones();

/*Llamamos y usamos las funciones de forma normal como si las tendriamos nosotros en nuestra aplicacion*/
echo "Funcion saberNombre()<br>";

$nombreModulo = $cliente->saberNombre("AD");

if (!empty($nombreModulo)) { echo "El nombre del modulo es: <b>" . $nombreModulo['nombre'] . "</b><br><br>";
} else { echo "No existe modulo con este codigo<br><br>";
}


echo "Funcion matriculadosCiclo()<br>";
$alumnosCiclo=$cliente->matriculadosCiclo("DAW");

if(!empty($alumnosCiclo)) {
    echo "Los alumnos matriculados en el ciclo son: <br>";
    foreach ($alumnosCiclo as $value) {
        echo "<b>".$value["alumno"] . "</b><br>";
    }

}else{
    echo "No hay alumnos matriculados en este ciclo<br><br>";
}


echo "<br>Funcion modulosCompletos()<br>";
$alumnosModulos=$cliente->modulosCompletos();
    $tabla= "<table> <thead><tr><th>Nombre alumno</th><th>Numero modulos</th></tr></thead>";
    $tabla.="<tbody>";
foreach ($alumnosModulos as $value) {
    $tabla.="<tr><td>".$value["alumno"] . "</td><td>". $value["numeromodulos"] ."</td></tr>";
}
$tabla.="</tbody></table>";
echo $tabla;
 
 