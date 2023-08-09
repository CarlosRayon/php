<?php
/*Declaramos todas nuestras variables fuera del bucle*/
    $valores = array(7, 19, 25, 12, 23, 15, 8, 16);
    
    $sum_valores=array_sum($valores);

    $frecuenciaAbAcumulada = 0;
    $sum_faa=0;

    $frecuenciaRelativa = 0;
    $sum_fr=0;
    $fr = 0;

    $frecuenciaRelativaAcumulada = 0;
    $sum_fra=0;


/*Usaremos una variable para ir construyendo la tabla*/

    $tablaHTML="<table border=\"1\">";
    $tablaHTML.="<th>X</th>
                 <th>Frecuencia absoluta</th>
                 <th>Frecuencia absoluta acumulada</th>
                 <th>Frecuencia relativa</th>
                 <th>Frecuencia relativa acumulada</th>";
    
     /*Leemos las claves y valores del array. Usamos $k+1 para los números*/
foreach ($valores as $k=>$v) 

{
    /*Calculamos valores*/
    $contador=$k+1;
        
    $frecuenciaAbAcumulada += $v;
        
    $sum_faa+=$frecuenciaAbAcumulada;

    $fr = $v / $sum_valores;
        
    $frecuenciaRelativa = number_format(round($fr, 2, PHP_ROUND_HALF_UP), 2);
        
    $sum_fr+=$fr;

    $frecuenciaRelativaAcumulada += $v / $sum_valores;
    $fra = number_format(round($frecuenciaRelativaAcumulada, 2, PHP_ROUND_HALF_UP), 2);
    $sum_fra+=$fra;

    /*Agregamos valores a la tabla*/
    $tablaHTML.="<tr>";
    $tablaHTML.="<td>$contador</td>"; 
    $tablaHTML.="<td>$v</td>"; 
    $tablaHTML.="<td>$frecuenciaAbAcumulada</td>"; 
    $tablaHTML.="<td>$frecuenciaRelativa</td>"; 
    $tablaHTML.="<td>$fra</td>";
    $tablaHTML.="</tr>";

}

   
  /*La línea de Totales la agregamos fuera del bucle*/
    $tablaHTML.="<tr class=\"total\">";
    $tablaHTML.="<td>Total</td>";
    $tablaHTML.="<td>$sum_valores</td>";
    $tablaHTML.="<td>$sum_faa</td>";
    $tablaHTML.="<td>$sum_fr</td>";
    $tablaHTML.="<td>$fra</td>";
    $tablaHTML.="</tr>";

    $tablaHTML.="</table>";
    /*Imprimimos la tabla*/
    echo $tablaHTML;


?>