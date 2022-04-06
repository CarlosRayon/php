<?php

/**
 * Datos necesarios para conectarse  al BD.
 */

/*Datos para conectar en local
define("USER", 'root');
define("PASS", '');
define("BD", "dbname=lagordad_web;");
define("SERVER", "host=localhost;");
define("CHARSET", "charset=utf8");
define("DRIVER", "mysql:");
define("DSN", DRIVER . SERVER . BD . CHARSET);
*/

/*Datos para conectar en PRODUCCION*/
define("USER", 'lagordad_web');
define("PASS", 'My(3+l=#kI.T');
define("BD", "dbname=lagordad_web;");
define("SERVER", "host=localhost;");
define("CHARSET", "charset=utf8");
define("DRIVER", "mysql:");
define("DSN", DRIVER . SERVER . BD . CHARSET);
