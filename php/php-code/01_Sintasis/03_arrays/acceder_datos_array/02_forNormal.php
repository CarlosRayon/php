<?php

$cadena = "Desarrollo web";
echo $cadena;
echo "<br>";
for ($i = strlen($cadena) - 1; $i >= 0; $i--) {
    echo $cadena[$i];
}
