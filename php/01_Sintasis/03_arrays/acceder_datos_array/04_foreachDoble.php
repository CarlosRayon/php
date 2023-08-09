<?PHP

$ciclos = array(
    'DAM' => array(
        'primero' => array('FOL', 'BBDD', 'programacion', 'lenguajes de marcas', 'sistemas informaticos', 'EEDD'),
        'segundo' => array('AD', 'PMD', 'PSP', 'DI', 'SGE', 'FCT', 'proyecto', 'EIE')
    ),
    'DAW' => array(
        'primero' => array('FOL', 'BBDD', 'programacion', 'lenguajes de marcas', 'sistemas informaticos', 'EEDD'),
        'segundo' => array('DWES', 'DWEC', 'EIE', 'DIW', 'DAW', 'FCT', 'proyecto')
    )
);

echo "<h2>modulos de segundo: </h2>";
foreach ($ciclos as $key => $value) {
    echo "<br><strong>$key:</strong>";
    foreach ($value['segundo'] as $modulo) {
        echo "<br>$modulo";
    }
}

//-------------------------------------------------------------

foreach ($ciclos as $llave => $valor) {
    foreach ($valor as $key => $modulos) {
        echo "<h3>$llave $key</h3>";
        foreach ($modulos as $modulo) {
            echo "<br>$modulo";
        }
        echo "<br>";
    }
}
