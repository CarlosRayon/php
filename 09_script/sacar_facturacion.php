<?php

/* Vendra DB seguramente */
$importe = 69.99;
$unidades = 4;

$cesta = [
    'linea-1' => ['importe' => 10.99, 'unidades' => 2],
    'linea-2' => ['importe' => 1.99, 'unidades' => 2]
];


$iva = 1.21; /* 21% iva */

/*************/


$baseImp = 0;
$subTotal = 0;
$impuestoLinea = 0;
$totalLinea = 0;
$subTotalFinal = 0;
$ivaTotalFinal = 0;
$totalFinal = 0;

foreach ($cesta as $linea => $lineaCesta) {
    $iva = $lineaCesta['importe'] - ($lineaCesta['importe']  / $iva);
    $baseImp = $lineaCesta['importe'] - $iva;  /* precio sin iva*/
    $subTotal = $baseImp * $lineaCesta['unidades']; /* Bases imponibles por unidades */
    $impuestoLinea = $iva * $lineaCesta['unidades']; /* total - subtotal */
    $totalLinea = $subTotal + $impuestoLinea;

    echo "Linea Factura $linea <br>";
    echo 'PVP -- ' . number_format($lineaCesta['importe'], 2) . '<br>';
    echo 'base Imponible -- ' . number_format($baseImp, 2) . '<br>';
    echo 'Unidades -- ' . $lineaCesta['unidades'] . '<br>';
    echo 'subtotal -- ' . number_format($subTotal, 2) . '<br>';
    echo 'Impuesto por linea -- ' . number_format($impuestoLinea, 2) . '<br>';
    echo 'Total -- ' . number_format($totalLinea, 2) . '<br>';

    echo '<br><br>';

    $subTotalFinal += $subTotal;
    $ivaTotalFinal += $impuestoLinea;
    $totalFinal += $totalLinea;
}

$baseImpTotal = $subTotalFinal;


echo 'Total factura <br>';
echo 'subtotal Final ' . number_format($subTotalFinal, 2) . '<br>';
echo 'Base Imponible ' . number_format($baseImpTotal, 2) . '<br>';
echo 'Iva Total ' . number_format($ivaTotalFinal, 2) . '<br>';
echo 'Total Final ' . number_format($totalFinal, 2) . '<br>';
