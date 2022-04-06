<?php
 session_start();
 unset($_SESSION['cesta']);
 echo "<h2>Pedido pagado correctamente, gracias por su compra</h2><br/>"; 
 echo "Realizar <a href='productos.php'>Nueva compra</a>"; 

?>

