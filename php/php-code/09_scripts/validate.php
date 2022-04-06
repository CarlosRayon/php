<?php

if (!isset($_POST['nombre']) || $_POST['nombre'] == '') {
    echo json_encode(array('status' => false, 'code' => 'not name', 'msg' => 'Introducir un nombre valido es obligatorio.'));
    die();
}

if (!isset($_POST['apellido']) || $_POST['apellido'] == '') {
    echo json_encode(array('status' => false, 'code' => 'not subname', 'msg' => 'Introducir un apellido valido es obligatorio.'));
    die();
}

if (!isset($_POST['email']) || !isValidMail($_POST['email'])) {
    echo json_encode(array('status' => false, 'code' => 'not mail', 'msg' => 'Introducir un email valido'));
    die();
}

if (!isset($_POST['tel']) || !isValidPhone($_POST['tel'])) {
    echo json_encode(array('status' => false, 'code' => 'not tel', 'msg' => 'Introducir un teléfono valido es obligatorio.'));
    die();
}

/* All ok */
echo json_encode(array('status' => true, 'code' => 'all ok', 'msg' => 'all ok'));
die();


/**
 * isValidPhone Validate phone
 *
 * @param int $tel
 *
 * @return boolean
 */
function isValidPhone($tel)
{

    if (!is_numeric($tel)) {
        return false;
    }
    if (!preg_match('/^[9|8|7|6]\d{8}$/', $tel)) {
        return false;
    }

    return true;
}

/**
 * isValidMail Validate email
 *
 * @param mixed $mail
 *
 * @return void
 */
function isValidMail($mail)
{

    if (trim($mail) != '') {

        // Remove all illegal characters from email
        $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);

        // Validate e-mail
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
    }

    return true;
}
