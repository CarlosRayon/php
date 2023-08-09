<?PHP
    $usuarios=array(
    array('nombre'=>'juan',
          'apellido'=>'apellido1',
          'edad'=>22,
          'email'=>'nombre1@lclis.com',
          'mascotas'=>array('gato','perro','araña')
          ),
    array('nombre'=>'nombre2',
          'apellido'=>'apellido2',
          'edad'=>25,
          'email'=>'nombre2@lclis.com',
          'mascotas'=>array('pez','vaca','conejo')
          )
    );

    // añadir oveja
    array_push($usuarios[0]['mascotas'], "oveja");
    // mas sencillo
    $usuarios[0]['mascotas']="oveja";
    
    print_r($usuarios);
        
      
    ?>