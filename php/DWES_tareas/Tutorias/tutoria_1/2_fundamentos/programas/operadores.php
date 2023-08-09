<html>
<?
# definamos dos variables numéricas asignandoles valores
$a=53; $b=34;
/* hagamos una suma y escribamos directamente los resultados
utilizando las instrucciones print y echo
con todas sus posibles opciones de sintaxis */
$variable = "diferente";
  echo $variable."<br>";
print("La suma de $a + $b es: " . $a . "+" . $b . "=" . ($a+$b)."<br>");
print "La suma de $a + $b es: " . $a . "+" . $b . "=" . ($a+$b) ."<BR>";
print ("La suma de $a + $b es: " . $a . "+" . $b . "=" . ($a+$b) ."<BR>");
echo "La suma de $a + $b es: " . $a . "+" . $b . "=" . ($a+$b) ."<BR>";
echo "La suma de $a + $b es: " , $a , "+" , $b . "=" , ($a+$b) ."<BR>";
echo "La suma de $a + $b es: " , $a , "+" , $b , "=" , $a+$b ,"<BR>";
printf ("La suma de $a + $b es: %d + %d = %d  \n" , $a , $b, $a+$b);
echo "<BR>";
printf ("La division de $a / $b es: %d / %d = %f" , $a , $b, $a/$b) ;
echo "<BR>";
printf ("NO SALTA(9.95 * 100) = %d \n", (9.95 * 100));    // no salta de línea
printf ("(9.95 * 100) = %f <br>", (9.95 * 100));

$nombre="juan";$apellido="lopez";$edad=25; 
 printf ("el nombres es %s, el apellido es %s y tiene %d años", $nombre, $apellido, $edad); 
 echo "<BR>";
 $mascara="el nombres es %s, el apellido es %s y tiene %d años";
 printf ($mascara, $nombre, $apellido, $edad);
  echo "<BR>";
 printf("%d",10023123553.45634663);   // desbordamiento al truncar a entero
 echo "<BR>";
  printf("%d",1002.45634663);
 echo "<BR>";
 printf("%f",10023123553.45634663);   // floar, es correcto
?>

</html>