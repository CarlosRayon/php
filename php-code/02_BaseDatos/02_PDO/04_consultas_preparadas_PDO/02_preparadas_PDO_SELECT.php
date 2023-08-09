<?php

/*
  Consulta preparada SELECT con PDO
  La teoria y funcionamiento es igual que las de mysqli
 * RECUERDA!!!-PDO admite asigna variables por nombres :nombre o por numeros
 */

$arrayConsulta = array(); //Array donde guardar los datos
try {
    /* Lo primero como simpre nos conectamos a la base de datos */
    $conexion = conectarBaseDatos();

    /* Creamos la query que queramos */
    $query = "SELECT * FROM usuarios WHERE nombreusuario = :nombre"; //El valor cambiante lo ponemos :

    $PDOstmt = $conexion->prepare($query); //Preparamos consultas

    $PDOstmt->bindParam(':nombre', $nombre); //blindeamos(igualamos) los valores de la consulta

    $nombre = "carlos"; //Le decimos el valor de los parametros blindeados

    $PDOstmt->execute(); //Ejecutamos

    /* Para capturar los datos */
    while ($filaArray = $PDOstmt->fetch()) { //usamos el metodo fetch() de PDOstmt
        array_push($arrayConsulta, $filaArray); //guardamos los datos en un array
    }

    echo $arrayConsulta[0]['nombreusuario']; //Mostramo los datos del array normalmente...

    foreach ($arrayConsulta as $value) { //..O con bucle foreach
        echo $value['nombreusuario'];
    }

    /* Podemos pasar los datos al array de varias maneras igual que con mysqli,
     * para ello debemos pasar un parametro al fetch()
     * Los parametros son los siguiente:
      PDO::FETCH_ASSOC: devuelve un array indexado cuyos keys son el nombre de las columnas.
      PDO::FETCH_NUM: devuelve un array indexado cuyos keys son números.
      PDO::FETCH_BOTH: valor por defecto. Devuelve un array indexado cuyos keys son tanto el nombre de las columnas como números.
      PDO::FETCH_BOUND: asigna los valores de las columnas a las variables establecidas con el método PDOStatement::bindColumn.
      PDO::FETCH_CLASS: asigna los valores de las columnas a propiedades de una clase. Creará las propiedades si éstas no existen.
      PDO::FETCH_INTO: actualiza una instancia existente de una clase.
      PDO::FETCH_OBJ: devuelve un objeto anónimo con nombres de propiedades que corresponden a las columnas.
      PDO::FETCH_LAZY: combina PDO::FETCH_BOTH y PDO::FETCH_OBJ, creando los nombres de las propiedades del objeto tal como
     */

    /* Si queremos ejecutar mas veces */
    $nombre = "ines"; //Cambiamos el valor de los parametros blindeados
    $PDOstmt->execute(); //Volvemos a ejecutar

} catch (PDOException $ex) {
    die('Error: ' . $ex->getMessage());
}


//Podemos hacerla  sin blindear parametros*/
try {
    /* Lo primero como simpre nos conectamos a la base de datos */
    $conexion = conectarBaseDatos();
    $query = "SELECT * FROM usuarios WHERE nombreusuario = carlos";
    $PDOstmt = $conexion->prepare($query); //Preparamos
    $PDOstmt->execute(); //ejecutamos
} catch (PDOException $ex) {
    die('Error: ' . $ex->getMessage());
}
