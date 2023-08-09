<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Ejercicio 1 : Codifica un programa llamado “frecuencias.php” que resuelve 
    un estudio estadístico de las calificaciones finales de un conjunto de 
    estudiantes.  -->
<html>

<body>

    <!--Creamos la tabla con su cabecera -->
    <table>
        <tbody>
            <tr>
                <th>Xi</th>
                <th>F.abs.(ni)</th>
                <th>F.abs.acum (Ni)</th>
                <th>F.rel.(fi = ni/N)</th>
                <th>F.rel.acum. (Fi = Ni/N)</th>
            </tr>
            
        <!-- Damos valor al contenido calculando las frecuencias para las calificaciones dadas -->
        <?php        
        /*  Creamos un array con el número de alumnos que han sacado un uno, dos, tres,...
         * Cómo están en orden, no hace falta indicar la clave y contamos el numero de
         * alumnos.
         */
        $calificaciones = array(7, 19, 25, 12, 23, 15, 8, 16);
        $total = 0;
        foreach($calificaciones as $numAlumnos){
            $total+=$numAlumnos; 
        }

        // Recorremos el array de notas para calcular todas las frecuencias y lo
        // pintamos en la tabla.
        $numAlumnos_anterior=0;
        foreach($calificaciones as $nota => $numAlumnos){
            print "<tr>";
                print "<td>".$nota++."</td>";
                print "<td>".$numAlumnos."</td>";
                print "<td>".($numAlumnos + $numAlumnos_anterior)."</td>";
                printf("<td>%.2f</td>", $numAlumnos/$total);
                printf("<td>%.2f</td>", ($numAlumnos + $numAlumnos_anterior)/$total);
            print "<tr>";
            
            //Guardamos el acumulado de la nota anterior
            $numAlumnos_anterior+=$numAlumnos; 
        }
        
            //Pintamos el Total en el pie de la tabla.
            print "<tr>";
                print "<td>Total</td>";
                print "<td>".$total."</td>";
                print "<td>".$total."</td>";
                print "<td>1</td>";
                print "<td>1</td>";
            print "<tr>";
        ?>
        </tbody>
    </table>  
</body>
</html>

