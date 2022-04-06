<?php
 $arrayAsociativoMultidimensional=array("nombre"=>"carlos", "apellido"=>"Rayon","dirrecion"=>array(
                                                                                                      "calle"=>"lago meru","ciudad"=>"Mexico"),
                                           "Estudios"=>"DAW");

    /*Formas de acceder a los datos
    -Con un doble bucle foreach
    -$arrayAsociativoMultidimensional["dirrecion"]["ciudad"];  lago meru
    -current($arrayAsociativoMultidimensional["dirrecion"]);   lago meru
    -key($arrayAsociativoMultidimensional["dirrecion"]);       calle

    */
