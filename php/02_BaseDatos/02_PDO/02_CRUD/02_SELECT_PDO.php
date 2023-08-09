<?php

/*
  La forma trabajar con PDO y el SELECT es un poco distinta a la de mysqli
 */

/* Establecemos como siempre lo primero la conexion de una forma u otra */

/* preparamos la consulta */
$query = "SELECT * FROM `usuarios`";
try {

    $resultadoConsulta = $conexion->query($query); //Guardamos los datos de la consulta en una variable

    /* VARIAS OPCIONES: */

    /* UN DATO
      -Si solo es un dato lo guardamos en una variable
      if(isset($resultadoConsulta)) {
      $row = $resultadoConsulta->fetch();
      }
     *   //Si lo devuelve un dato le puedo tratar con $unDato=$resultadoConsulta->fetchColumn(); Asi para mostrar el dato le muestro como una variable normal no como un array
     * RECUERDA!!! Tambien podemos crear objetos con este dato
     */

    /* VARIOS DATOS
     * Si son varios datos los guardamos en un array de con estos datos */
    if (isset($resultadoConsulta)) {
        $arrayConsulta = array();
        while ($filaArray = $resultadoConsulta->fetch()) {
            array_push($arrayConsulta, $filaArray);
        }


        /* Y vemos lo datos de esta manera */
        echo $arrayConsulta[0]['nombreusuario'];
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
} catch (PDOException $ex) {
    die("Se ha produccido un error" . $ex->getMessage()); //Capturamos errores y matamos (die es un equivalente a exit())
}


/*TODO EN UNA FUNCION*/
function selectPDO()
{
    /* preparamos la consulta o la pasamos por parametros tambien */
    $query = "SELECT * FROM `usuarios`";
    try {

        $resultadoConsulta = $conexion->query($query); //Guardamos los datos de la consulta en una variable

        /* VARIAS OPCIONES: */
        /*
          -Si solo es un dato lo guardamos en una variable
          if(isset($resultadoConsulta)) {
          $row = $resultadoConsulta->fetch();
          }
         * RECUERDA!!! Tambien podemos crear objetos con este dato
         */

        /* Si son varios datos los guardamos en un array de con estos datos */
        if (isset($resultadoConsulta)) {
            $arrayConsulta = array();
            while ($filaArray = $resultadoConsulta->fetch()) {
                array_push($arrayConsulta, $filaArray);
            }
            return $arrayConsulta;
        }
    } catch (PDOException $ex) {
        die("Se ha produccido un error" . $ex->getMessage()); //Capturamos errores y matamos (die es un equivalente a exit())
    }
}
