<?php

/*
 Consultas usando mysqli orientado a  objetos:
 * Similar a la procedimental.
 * Trabajamos con el objeto que guarde la conexion
 */

/*
  Consultas usando mysqli procedimental:

  -Formas de guardar las consultas:(?)
  $row=$->fetch_array();//devuelve array con claves numericas y asociativas
  $row=$resultadoConsulta->fetch_assoc();//array claves asociativas
  $row=$resultadoConsulta->fetch_row();//array claves numericas
  $row=$resultadoConsulta->fetch_object();//crea un objeto
 */

//Creamos la consulta  RECUERDA!!! Estando ya conectados
$query = "SELECT * FROM `usuarios`";

//Comprobamos que la consulta es correcta y guardamos el resultado a la vez
if ($resultadoConsulta = $conexion->query($query)) {

    /* Pasamos el resultado a un array de la forma eleguida(?), cada uno tiene sus ventajas:
     * Ejemplos:
     *  $filaArray=$resultadoConsulta->fetch_array();
      $filaAssoc= $resultadoConsulta->fetch_assoc();
      $filaRow= $resultadoConsulta->fetch_row();
      $filaObject= $resultadoConsulta->fetch_object();
     */

    /* Como cada vez que se llama a la funcion se guarda un valor en la variable por lo que si queremos
     * ver todos los valores o guardarlos en un array lo hacemos con un while.
     */

    $arrayConsulta = array();
    while ($filaObject = $resultadoConsulta->fetch_object()) {
        array_push($arrayConsulta, $filaObject);
    }

    print_r($arrayConsulta);
    //Puedo crear un objeto con cualquier objeto que tenga en el array
    $objeto = $arrayConsulta[0];
    //Y usar este objeto como si fuera un objeto normal
    echo $objeto->idusuario;


    //Despues de la operaciones cierro la conexion para liberar recursos
    $conexion->close();
} else {

    //Si tenemos error en la consulta, mostramos el error
    echo "Has tenido el siguiente error:<br />" . $conexion->error;
    /* Cierra la conexión */
    $conexion->close();
};


function consultaBaseDatos($conexion)
{
    //Devuelve una lista
    //Lo primero nos conectamos a la base datos
    $conexion = $this->conexion();

    $query = "SELECT * FROM `ciclo`";

    if ($resultadoConsulta = $conexion->query($query)) {

        $arrayConsulta = array();

        while ($filaArray = $resultadoConsulta->fetch_assoc()) {
            array_push($arrayConsulta, $filaArray);
        }
        return $arrayConsulta;
        $conexion->close();
    } else {
        echo "Has tenido el siguiente error:<br />" . $conexion->error;
        $conexion->close();
    }
}




//Todo en una funcion
function consultaBaseDatos2($conexion) //Devuelve un objeto
{
    $query = "SELECT * FROM `usuarios`";

    //Comprobamos que la consulta es correcta y guardamos el resultado a la vez
    if ($resultadoConsulta = $conexion->query($query)) {

        $arrayConsulta = array();
        while ($filaObject = $resultadoConsulta->fetch_object()) {
            array_push($arrayConsulta, $filaObject);
        }

        print_r($arrayConsulta);
        //Puedo crear un objeto con cualquier objeto que tenga en el array
        $objeto = $arrayConsulta[0];
        //Y usar este objeto como si fuera un objeto normal
        echo $objeto->idusuario;


        //Despues de la operaciones cierro la conexion para liberar recursos
        $conexion->close();
        return $objeto;
    } else {

        //Si tenemos error en la consulta, mostramos el error
        echo "Has tenido el siguiente error:<br />" . $conexion->error;
        /* Cierra la conexión */
        $conexion->close();
    };
}
