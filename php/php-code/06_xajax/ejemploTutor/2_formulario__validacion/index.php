<?php

// incluimos la clase
require_once "xajax/xajax_core/xajax.inc.php";
 
// Incluimos las funciones generales
require_once "modppal.php";

// Creamos una instancia al objeto XAJAX:
$xajax = new xajax();

// valida el campo pasado por parametro
function validarCampos($form,$sCampo)
{
    $sCadena = $form["txt$sCampo"];
    $sCampo2 = (strpos($sCampo, '2') ? substr($sCampo, 0, (strlen(trim($sCampo))-1)) : '');
 
    // iniciamos el llamado a las validaciones segun sea el caso
    if (empty($sCadena)) {
        $sMsjGlobal = 'El campo <b>'. (!empty($sCampo2) ? "Confirme $sCampo2" : $sCampo) .
         '</b> es obligatorio, no puede dejarlo en blanco.';
    } else
    {
        if ($sCampo == 'Nombres' || $sCampo == 'Apellidos') {
            $sMsjGlobal = NotIsCorrect($sCadena, $sCampo);
        } elseif ($sCampo == 'CI') {
            $sMsjGlobal = NotIsCI($sCadena);
        } elseif ($sCampo == 'Email') {
            $sMsjGlobal = NotIsEmail($sCadena);
        } elseif ($sCampo == 'Password') {
            $sMsjGlobal = NotIsPassword($sCadena);
        } elseif (!empty($sCampo2)) {
            $sMsjGlobal = NotIsEqua($sCadena, $form["txt$sCampo2"], $sCampo2);
        }
    }
 
    // asignamos el valor que determinara la imagen y el mensaje a mostrar por campo
    $sImg = (!(!$sMsjGlobal) ? 'incorrecto' : 'correcto');
 
    // asignamos el codigo html para los mensajes
    $sHTMLMsjLocal  = "<div class='DivLocal'><img border='0'
src='imagenes/$sImg.png' /> valor $sImg</div>";
    $sHTMLMsjGlobal = "<div class='DivGlobal'><img border='0'
src='imagenes/warning.png' /> $sMsjGlobal</div>";
 
    // creamos una nueva instancia para generar la respuesta con ajax (xajaxResponse).
    $objRespuesta = new xajaxResponse();
    
    // Actualizamos los div
    $objRespuesta -> assign("div$sCampo", 'innerHTML', $sHTMLMsjLocal);
    $objRespuesta -> assign('DivGlobal', 'innerHTML', (!(!$sMsjGlobal) ? $sHTMLMsjGlobal : ''));

    // retornamos el objeto
    return $objRespuesta;
}

function PrcesarFormulario($form)
{
    // creamos una nueva instancia para generar la respuesta con ajax
    $objRespuesta = new xajaxResponse();
 
    // si los campos estan correctos 
    if (NotIsCorrect($form['txtNombres'], 'Nombres') != false 
        || NotIsCorrect($form['txtApellidos'], 'Apellidos') != false 
        || NotIsCI($form['txtCI']) != false 
        || NotIsEmail($form['txtEmail']) != false 
        || NotIsPassword($form['txtPassword']) != false 
        || NotIsEqua($form['txtEmail'], $form['txtEmail2'], 'E-mal') != false 
        || NotIsEqua($form['txtPassword'], $form['txtPassword2'], 'Password') != false
    ) {
        $mensaje="ERROR, datos incompletos";
        $objRespuesta -> assign("salida", 'innerHTML', $mensaje);
        // $objRespuesta -> alert('¡El formulario debe estar perfectamente validado!');
    }
    else
    {
        /* 
         Aqui iria el proceso que almacena los datos en la Base de Datos,
         recuerda que los datos deben de ser filtrados por seguridad
         script ...
         script ....
         script .....
        */
 
        /* luego de que has hecho lo debido con los datos,
         informamos al usuario del resultado
         podemos hacerlo usando un DIV o bien, un alert de JavaScript
        */

        $objRespuesta ->alert('¡Datos almacenados correctamente!');
 
        // limpiamos los campos
        $ArrayCampos = array('Nombres','Apellidos','CI','Email','Email2','Password','Password2'); 
        //$NumCampos = count($ArrayCampos);     
        for ($i=0; $i<7; $i++)//no hace falta usar count puesto que sabemos cuantos campos con..
        {
            $objRespuesta
                -> clear("txt$ArrayCampos[$i]", 'value')      //limpiando los txt
                -> clear("div$ArrayCampos[$i]", 'innerHTML'); //limpiando los div  
        }
    }
    return $objRespuesta;
}

$xajax -> registerFunction('validarCampos');  // gestiona las validaciones del formulario
$xajax -> registerFunction('PrcesarFormulario'); // procesa los datos del formulario

//Le indicamos al objeto xajax que procese la peticion / el pedido
$xajax -> processRequest();
?>


<html>
<head>
    <title>Validaciones con XAJAX</title>
   <link href="estilo.css" rel="stylesheet" />
   <?php 
     //se le dice que Incluya el JavaScript generado desde XAJAX
     $xajax -> printJavascript('xajax/'); 
    ?>
</head>
<body onload='document.form1.txtNombres.focus()'>
   <form name='form1' id='form1' action='javascript:void(null);' 
   onsubmit="xajax_PrcesarFormulario(xajax.getFormValues('form1'))">
   <div class='DivTable'>
   <table border='0'>
      <tr><td colspan='3'><div id='DivGlobal'></div><hr/></td></tr>
      <tr>
         <td align='right' width='220px' class='Campos'>Nombres:</td>
         <td width='200px'>
            <input tabindex='1' type='text' id='txtNombres' name='txtNombres' size='30' maxlength='40' 
            onkeyup="xajax_validarCampos(xajax.getFormValues('form1'),'Nombres')" />
         </td>
         <td align='left' width='300px'><div id='divNombres'></div></td>
      </tr>
      <tr>
         <td align='right' class='Campos'>Apellidos:</td>
         <td align='left'>
            <input tabindex='2' type='text' id='txtApellidos' name='txtApellidos' size='30' maxlength='40'
            onkeyup="xajax_validarCampos(xajax.getFormValues('form1'),'Apellidos')" />
         </td>
         <td><div id='divApellidos'></div></td>
      </tr>
      <tr>
         <td align='right' width='220px' class='Campos'>C&eacute;dula de Identidad:</td>
         <td>
            <input tabindex='3' type='text' id='txtCI' name='txtCI' size='10' maxlength='8' 
            onkeyup="xajax_validarCampos(xajax.getFormValues('form1'),'CI')" />
         </td>
         <td align='left' width='300px'><div id='divCI'></div></td>
      </tr>
      <tr>
         <td align='right' class='Campos'>E-mail:</td>
         <td align='left'>
            <input tabindex='4' type=text' id='txtEmail' name='txtEmail' size='30' maxlength='100' 
            onkeyup="xajax_validarCampos(xajax.getFormValues('form1'),'Email')" />
         </td>
         <td><div id='divEmail'></div></td>
      </tr>
      <tr>
         <td align='right' class='Campos'>Confirme Email:</td>
         <td align='left'>
            <input tabindex='5' type='text' id='txtEmail2' name='txtEmail2' size='30' maxlength='100' 
            onkeyup="xajax_validarCampos(xajax.getFormValues('form1'),'Email2')" />
         </td>
         <td><div id='divEmail2'></div></td>
      </tr>
      <tr>
         <td align='right' width='220px' class='Campos'>Password:</td>
         <td width='200px'>
            <input tabindex='6' type='password' id='txtPassword' name='txtPassword' size='25' maxlength='25' 
            onkeyup="xajax_validarCampos(xajax.getFormValues('form1'),'Password')" />
         </td>
         <td align='left' width='300px'><div id='divPassword'></div></td>
      </tr>
      <tr>
         <td align='right' class='Campos'>Confirme Password:</td>
         <td align='left'>
            <input tabindex='7' type='password' id='txtPassword2' name='txtPassword2' size='25' maxlength='25' 
            onkeyup="xajax_validarCampos(xajax.getFormValues('form1'),'Password2')" />
         </td>
         <td><div id='divPassword2'></div></td>
      </tr>
      <tr><td align='center' colspan='3'><hr/><input type='submit' tabindex='8' value='Guardar los datos'></td></tr>
   </table>
   
   <div id='salida'></div>
   
   </div>
   <br/><div style='text-align:center;'><img border='0' src='imagenes/xajax_powered.png' /></div>
   
   </form>
</body>
</html>