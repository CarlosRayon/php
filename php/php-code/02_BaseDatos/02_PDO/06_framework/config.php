<?php

/**
 * Datos necesarios para conectarse  al BD.
 */

/*Datos para conectar en local*/
define("USER", 'root');
define("PASS", '');
define("BD", "dbname=nombreBD;");
define("SERVER", "host=localhost;");
define("CHARSET", "charset=utf8");
define("DRIVER", "mysql:");
define("DSN", DRIVER . SERVER . BD . CHARSET);
