<?php
function precio_con_iva(&$precio, $iva=0.18)
{
     $precio *= (1 + $iva);
}
$precio = 10;

precio_con_iva($precio); //Esta linea falta en el ejemplo 
print "El precio con IVA es ". $precio; 
?>
