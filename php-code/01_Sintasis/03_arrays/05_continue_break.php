<?php

    /*continue
    * De esta menera solo muestro las keys
    */
foreach ($arrayNuevoAsociativo as $key => $value) {
    echo 'Solo muestros las key'. $key . '<br>';
    continue;
    echo 'Los valores no se muestran ' . $value. '<br>';
}

   //break;
   //De esta menera rompo el flujo del bucle y me salgo de el
foreach ($arrayNuevoAsociativo as $key => $value) {
    if($value==2) {
        break;
    }
    echo "Nada mas que me muestra la key primera. la segunda se cumple la condicion y se rompe el bucle $key";

}
