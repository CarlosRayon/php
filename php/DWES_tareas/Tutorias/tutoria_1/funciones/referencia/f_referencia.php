<?php
function incrementa(&$a)
{
    $a = $a + 1;
    echo "dentro \$a vale $a <br>";
}


$a=5;

incrementa($a);
echo $a; // Muestra un 2

?>
