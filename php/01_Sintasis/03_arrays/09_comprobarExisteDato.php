<?php

/*
Para comprobar si un dato existe en el array usamos in_array(<datoBuscar>, $arrayDondebuscar)
 */
//Para un array de una dimension
$paises = array(
    'spain' => 'madrid', 'portugal' => 'lisboa', 'rusia' => 'moscu', 'bielorusia' => 'minsk', 'cuba' => 'la Habana',
    'francia' => 'Paris'
);

echo "<BR>la capital de francia es: ", $paises['francia'], "<br>";

//Para comprobar si existe la clave
if (array_key_exists('rusia', $paises)) {
    echo "rusia esta en el array";
} else {
    echo "no esta rusia en el array";
}

//Para comprobar si existe el valor
if (in_array('moscu', $paises)) {
    echo "<br> existe moscu";
} else {
    echo "<br>no existe moscu en el array";
}
echo "<br><br>";

//Para un array multidimensional
$usuarios = array(
    array(
        'nombre' => 'juan',
        'apellido' => 'apellido1',
        'edad' => 22,
        'email' => 'nombre1@lclis.com',
        'mascotas' => array('gato', 'perro', 'araña')
    ),
    array(
        'nombre' => 'nombre2',
        'apellido' => 'apellido2',
        'edad' => 25,
        'email' => 'nombre2@lclis.com',
        'mascotas' => array('pez', 'vaca', 'conejo')
    )
);


//Debemos logicamente acceder al array donde puede estar el dato
if (array_key_exists('email', $usuarios[0])) {
    echo "Existe la clave";
} else {
    echo "no esta la clave";
}

//Comprobar si existe un dato en el array
if (in_array('apellido1', $usuarios[0])) {
    echo "Existe";
} else {
    echo "No existe";
}




print_r(array_values($paises));
print_r(array_keys($usuarios[0]));
