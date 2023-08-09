<!DOCTYPE html>

<html>
    <head>
        <title>Frecuencias</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">

            #verde{

                background: green;
                color: white;
                text-align: center;
            }

            table{
                border-collapse:collapse;
                background-color: #97BB00;
                border-color: white;
                text-align: center;

            }

        </style>
    </head>
    <body>
        <table  border="solid" align="center" >
            <?php
            //Variables
            $valores = array(7, 19, 25, 12, 23, 15, 8, 16);
            $total = array_sum($valores);
            $frecuenciaAbAcumulada = 0;
            $fr = 0;
            $frecuenciaRelativa = 0;
            $totalFrecuenciaRelativa = 0;
            $fra = 0;
            $frecuenciaRelativaAcumulada = 0;


            echo "<tr><td id=\"verde\"><b>X1</b></td>";
            for ($i = 0; $i < count($valores); $i++) {
                $indice = $i + 1;
                echo "<td> <b>$indice</b> </td>";
            }
            echo "<td id=\"verde\"><b>TOTAL<b></td>";
            echo "</tr>";

            echo "<tr><td id=\"verde\"><b>Frecuencia<br> absoluta</b></td>";
            foreach ($valores as $value) {
                echo "<td>$value</td>";
            }
            echo "<td id=\"verde\"><b>$total</b></td>";
            echo "</tr>";

            echo "<tr><td id=\"verde\"><b>Frecuencia<br> absoluta <br>acumulada</b></td>";

            foreach ($valores as $value) {
                $frecuenciaAbAcumulada += $value;
                echo "<td>$frecuenciaAbAcumulada</td>";
            }
            echo "<td id=\"verde\"><b>$total</b></td>";
            echo "</tr>";

            echo "<tr><td id=\"verde\"><b>Frecuencia<br>relativa</b></td>";

            foreach ($valores as $value) {
                $fr = $value / array_sum($valores);
                $frecuenciaRelativa = number_format(round($fr, 2, PHP_ROUND_HALF_UP), 2, ',', '');
                echo "<td>$frecuenciaRelativa</td>";
            }


            foreach ($valores as $value) {
                $totalFrecuenciaRelativa += ($value / array_sum($valores));
            }
            echo "<td id=\"verde\"><b>$totalFrecuenciaRelativa</b></td>";
            echo "</tr>";

            echo "<tr><td id=\"verde\"><b>Frecuencia<br>Relativa<br>acumulada</b></td>";


            foreach ($valores as $value) {
                $frecuenciaRelativaAcumulada += $value / array_sum($valores);
                $fra = number_format(round($frecuenciaRelativaAcumulada, 2, PHP_ROUND_HALF_UP), 2, ',', '');
                echo "<td>$fra</td>";
            }

            echo "<td id=\"verde\"><b>$fra</b></td>";
            echo "</tr>";
            ?>

        </table>

    </body>
</html>

