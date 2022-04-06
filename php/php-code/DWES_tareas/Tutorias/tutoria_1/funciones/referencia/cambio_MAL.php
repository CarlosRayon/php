<?php
echo "<br>Ejercicio Cambiar valor de 2 variables</br>";

Function cambio_variables($valor1,$valor2)
{
   
    $aux=$valor1;
    $valor1=$valor2;
    $valor2=$aux;
  
    echo "Este es el valor de \$valor1 PREVIO: ",$valor1."<br>";
    echo "Este es el valor de \$valor2 PREVIO: ",$valor2."<br>"; 
}


    $valor1=3;
    $valor2=12;
    cambio_variables($valor1, $valor2);
    
    print "</br> ";
    echo "Este es el valor de \$valor1 ACTUAL : ",$valor1,"<br>";
    echo "Este es el valor de \$valor2 ACTUAL : ",$valor2,"<br>"; 
  
?>
