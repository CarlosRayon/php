<!-- HTML -->

<form action="ajax.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre">
    </div>
    <div class="form-group">
        <label for="file">File</label>
        <input type="file" name="file" id="file">
    </div>
    <button type="submit">Submit</button>
</form>



<?php
/* PHP */
//Si existe el archivo (file es el name del input del formulario)
if (isset($_FILES['file'])) {
    //Obtenemos datos del ficher
    $errors = array();
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

    //Otros datos del post

    $nombre = $_POST['nombre'];

    //Validamos las extensiones que queramos
    $extensions = array("jpeg", "jpg", "png", "nacs");
    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    //Validamos tamaño
    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
    }

    //Movemos/guardamos en la ubicacion que queramos
    if (empty($errors) == true) {

        /*Si queremos validar que ya exista el fichero antes de subirlo usamos:
        if(file_exists("files/".$file_name)){
        echo "Ya existe";
        }
         */

        if (move_uploaded_file($file_tmp, "files/" . $file_name)) { //OPCIONAL CONTANAR CON uniqid()  GENERA UN ID UNICO PARA QUE NO SE REPITA EL NOMBRE
            echo "Subido el fichero: " . $file_name . ' Por ' . $nombre;
        } else {
            $errors[] = "El directorio no existe";
            print_r($errors);
        }
    } else {
        print_r($errors);
    }
}

?>
