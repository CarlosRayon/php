<?php
/*
Variable heredoc: RECUERDA ESTO PUNTOS QUE SON IMPORTANTES PARA QUE NO DE ERROR

    -Para cerrar el string, se debe colocar el identificador de nuevo seguido de un punto y coma,
     en una nueva línea y sin ningún espacio, tabulación o carácter a su izquierda o derecha.

    -El primer carácter antes del identificador de cierre debe ser un salto de línea definido por el sistema operativo local,
     y también ha de seguirle un salto de línea después (el punto y coma puede ir pegado o en la siguiente línea).
*/

$a = <<<HDC
        Pongo aqui lo que
        quiero. Ideal para poner textos largos o consultas SQL

HDC;

echo $a;
