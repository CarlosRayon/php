<html>
<?

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