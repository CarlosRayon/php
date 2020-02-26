 <?php

    $error_msg = "Error xxxxxx";
    $list_error = debug_backtrace()[0];
    $error = $error_msg . ' || ';
    $error .= 'Fichero: ' . $list_error['file'] . ' || ';
    $error .= 'Funcion: ' . $list_error['function'] . ' || ';
    $error .= 'Clase: ' . $list_error['class'] . ' || ';
    $error .= 'Linea: ' . $list_error['line'] . ' || ';

    if (write_file(FCPATH . '/logs_error/' . date('d-m-Y : H:i:s') . '_error.txt', $error) == FALSE) {
        echo 'Insertado ';
    } else {
        echo 'Insertado';
    }

    /*** */
