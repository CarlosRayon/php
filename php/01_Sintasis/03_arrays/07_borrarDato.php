<?PHP

$paises = array(
    'spain' => 'madrid', 'portugal' => 'lisboa', 'rusia' => 'moscu', 'bielorusia' => 'minsk', 'cuba' => 'la Habana',
    'francia' => 'Paris'
);

echo "<BR>la capital de francia es: ", $paises['francia'], "<br>";

if (array_key_exists('rusia', $paises)) {
    echo "rusia esta en el array";
} else {
    echo "no esta rusia en el array";
}

if (in_array('moscu', $paises)) {
    echo "<br> existe moscu";
} else {
    echo "<br>no existe moscu en el array";
}

echo "<br>";
unset($paises["spain"]);
print_r($paises);
