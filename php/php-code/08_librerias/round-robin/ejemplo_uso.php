<?php

/*----------------------------------------------------------------------------
                EJEMPLO DE USO
----------------------------------------------------------------------------*/

//Recuperamos los datos de la BD o creamos un array asociativo


// OPCIONAL Si el numero de equipos es impar añadimos un valor de descanso.
if ((count($nombreEquipos) % 2) != 0) {
    $descanso = ["nombre" => "Descanso"];
    array_push($nombreEquipos, $descanso);
}

// Usamos la librería de round-robin para generar el array con los encuentros (https://github.com/mnito/round-robin)

// Calculamos el numero rondas que tendrá la competición
$rondas = (($count = count($nombreEquipos)) % 2 === 0 ? $count - 1 : $count) * 2;

//Usamos el objeto
$scheduleBuilder = new ScheduleBuilder($nombreEquipos, $rondas);

//Guardamos los datos (Sera un nuevo array co  todas las combinaciones posible)
$jornadas = $scheduleBuilder->build();

var_dump($jornadas);
print_r($jornadas);


/*-----------------------------------------------------------------------
           EJEMPLO MUESTRA DE DATOS CON DOS FOREACH
------------------------------------------------------------------------*/
?>

<h2>Calendario</h2>

<!-- Lista creada en el servidor con la sintasis alternativa de PHP para los bucles -->
<ul id="ul-jornadas">

    <?php foreach ($jornadas as $jornada => $partidos) : ?>

        <li class="jornada"> Jornada <?php echo $jornada ?> </li>

        <?php foreach ($partidos as $indice => $equipo) : ?>
            <?php $valorJornadas = ($indice % 2) ? "par" : "impar"; ?>

            <li class="<?php echo $valorJornadas ?>">
                <span class=" <?php if ($equipo[0]['nombre'] == "Descanso") {
                                    echo "descanso";
} ?>">
                    <?php echo $equipo[0]['nombre'] ?>
                </span>
                <span class=" <?php if ($equipo[1]['nombre'] == "Descanso") {
                                    echo "descanso";
} ?> ">
                    <?php echo $equipo[1]['nombre'] ?>
                </span>
            </li>

        <?php endforeach; ?>

    <?php endforeach; ?>
</ul>
