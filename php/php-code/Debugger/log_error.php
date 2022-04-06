 <?php

    $error_msg = "Error xxxxxx";
    $list_error = debug_backtrace()[0];
    $error = $error_msg . ' || ';
    $error .= 'Fichero: ' . $list_error['file'] . ' || ';
    $error .= 'Funcion: ' . $list_error['function'] . ' || ';
    $error .= 'Clase: ' . $list_error['class'] . ' || ';
    $error .= 'Linea: ' . $list_error['line'] . ' || ';

 if (write_file(FCPATH . '/logs_error/' . date('d-m-Y : H:i:s') . '_error.txt', $error) == false) { /* codeigniter 3 */
     echo 'Insertado ';
 } else {
     echo 'Insertado';
 }

    /* PHP */
 try {

     /* Log */
     $date = date('d-m-Y H:i:s');
     file_put_contents(APPPATH . "logs/start.txt", PHP_EOL . 'Se ejecuto el dia ' . $date, FILE_APPEND | LOCK_EX);

     $debugger = false;

     $db->beginTransaction();
     /* Processes */

     /* Debugger */
     if ($debugger) {
         /* ... */
     }
     $db->commit();

     /* Log */
     $date = date('d-m-Y H:i:s');
     file_put_contents(APPPATH . "logs/success.txt", PHP_EOL . 'Success ' . $date, FILE_APPEND | LOCK_EX);
 } catch (Exception $th) {

     $db->rollBack();

     /* Log */
     $date = date('d-m-Y H:i:s');
     file_put_contents(APPPATH . "logs/error.txt", PHP_EOL . 'Error: ' . $date, FILE_APPEND . ' ' . $th->getMessage() | LOCK_EX);
     echo $th->getMessage();
 }
