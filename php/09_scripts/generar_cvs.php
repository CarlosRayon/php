<?php

function gen_csv_promovil($data, $tipo)
{
    $name = ($tipo == 'vacio') ? "promovil_no_encontradas" : "promovil_encontradas";
    $delimiter = ",";
    $filename = $name . date('Y-m-d') . ".csv";
    //create a file pointer
    $f = fopen('php://memory', 'w');
    //set column headers
    $fields = array('EAN', 'REf BB', 'Stock disponible', 'Descripcion corta', 'Descripcion Larga', 'Imagen', 'PVPR');
    fputcsv($f, $fields, $delimiter);
    //output each row of the data, format line as csv and write to file pointer
    foreach ($data as $row) {
        $image_data = $row['data']['imagen_del_producto'];
        $images = "";
        foreach ($image_data as $key => $image) {
            $images = $image['ORG'];
        }
        $lineData = array(
            $row['data']['ean'],
            $row['data']['referencia'],
            $row['data']['logispoint'],
            $row['data']['descripcion_es'],
            $row['data']['descripcion_larga'],
            $images,
            $row['data']['pvp_espana_oficial']
        );
        fputcsv($f, $lineData, $delimiter);
    }
    //move back to beginning of file
    fseek($f, 0);

    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
}
