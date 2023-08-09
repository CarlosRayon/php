<?php

/*
  Consultas usando mysqli procedimental:
  -Formas de guardar las consultas:(?)
  $row=mysqli_fetch_array($resultadoConsulta);//devuelve array con claves numericas y asociativas
  $row=mysqli_fetch_assoc($resultadoConsulta);//array claves asociativas
  $row=mysqli_fetch_row($resultadoConsulta);//array claves numericas
  $row=mysqli_fetch_object($resultadoConsulta);//crea un objeto
 */

//Creamos la consulta  RECUERDA!!! Estando ya conectados
$query = "SELECT * FROM `usuarios`";

//Comprobamos que la consulta es correcta y guardamos el resultado a la vez
if ($resultadoConsulta = mysqli_query($conexion, $query)) {

    /* Pasamos el resultado a un array de la forma eleguida(?), cada uno tiene sus ventajas:
     * Ejemplos:
     *  $filaArray=mysqli_fetch_array($resultadoConsulta);
      $filaAssoc= mysqli_fetch_assoc($resultadoConsulta);
      $filaRow= mysqli_fetch_row($resultadoConsulta);
      $filaObject= mysqli_fetch_object($resultadoConsulta);
     */

    /* Como cada vez que se llama a la funcion se guarda un valor en la variable por lo que si queremos
     * ver todos los valores o guardarlos en un array lo hacemos con un while.
     */
    $arrayConsulta = array();
    while ($filaObject = mysqli_fetch_object($resultadoConsulta)) {
        array_push($arrayConsulta, $filaObject);
    }


    /* ESPECIAL OBJETO:
     * Con mysqli_fetch_object() devuelvo los datos como objetos
     * Guardo los datos en un array que sera un array de objetos
     * Puedo crear un objeto de cualquier objeto que tenga en el array
     */
    //tengo un array de objetos:
    print_r($arrayConsulta);
    //Puedo crear un objeto con cualquier objeto que tenga en el array
    $objeto = $arrayConsulta[0];
    //Y usar este objeto como si fuera un objeto normal
    echo $objeto->idusuario;


    //Despues de la operaciones cierro la conexion para liberar recursos
    mysqli_close($conexion);
} else {

    //Si tenemos error en la consulta, mostramos el error
    echo "Has tenido el siguiente error:<br />" . mysqli_error($conexion);
    /* Cierra la conexión */
    mysqli_close($conexion);
};




//TODO EN UNA FUNCION(Devuelve un  array con clave valor de todos los datos de la consulta)

function consultaBaseDatos($conexion)
{

    $query = "SELECT * FROM `usuarios`";

    if ($resultadoConsulta = mysqli_query($conexion, $query)) {

        $arrayConsulta = array();

        while ($filaArray = mysqli_fetch_array($resultadoConsulta)) {
            array_push($arrayConsulta, $filaArray);
        }

        mysqli_close($conexion);
        return $arrayConsulta;
    } else {

        echo "Has tenido el siguiente error:<br />" . mysqli_error($conexion);
        mysqli_close($conexion);
    }
};



//Funcion que duelve los datos en forma de objeto
function consultaBaseDatos2($conexion)
{

    $query = "SELECT * FROM `usuarios`";

    if ($resultadoConsulta = mysqli_query($conexion, $query)) {


        $arrayConsulta = array();
        while ($filaObject = mysqli_fetch_object($resultadoConsulta)) {
            array_push($arrayConsulta, $filaObject);
        }

        $objeto = $arrayConsulta[0]; //Puedo poner el objeto del array que quiera
        mysqli_close($conexion);

        return $objeto;
    } else {

        echo "Has tenido el siguiente error:<br />" . mysqli_error($conexion);
        mysqli_close($conexion);
    };
};
