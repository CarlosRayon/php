<?php
/* Smarty version 3.1.30, created on 2018-01-24 07:32:58
  from "C:\xampp\htdocs\dswe_tarea05_smarty\smarty\templates\consulta.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties(
    $_smarty_tpl, array (
    'version' => '3.1.30',
    'unifunc' => 'content_5a68289a2b25b8_27639620',
    'has_nocache_code' => false,
    'file_dependency' => 
    array (
    'a6532cb2e391646f4fece6ed315e0b78a00d3738' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dswe_tarea05_smarty\\smarty\\templates\\consulta.tpl',
      1 => 1516775573,
      2 => 'file',
    ),
    ),
    'includes' => 
    array (
    ),
    ), false
)
) {
    function content_5a68289a2b25b8_27639620(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>consulta.tpl</title>
        <link type="text/css" rel="stylesheet" href="CSS/nueva.css">
    </head>
    <body>
        <header>
            <h2>2.Seleccion de los modulos</h2>
        </header>

        <section>
            <div id="modulos">

                 
                

                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['datosModulo']->value)===null||$tmp==='' ? "no definida" : $tmp);?>

                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['formularioModificar']->value)===null||$tmp==='' ? "no definida" : $tmp);?>




                <div id="alumnosmatriculado">                    
                    <h3>Relación de alumnos matriculados</h3>          

                     
                     

                    <p><b>Nombre:</b> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['alumnosMatriculados']->value[0]['alumno'])===null||$tmp==='' ? "no definida" : $tmp);?>
</p>
                    <p><b>Sexo:</b> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['alumnosMatriculados']->value[0]['sexo'])===null||$tmp==='' ? "no definida" : $tmp);?>
</p>
                    <p><b>Nacimiento:</b> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['alumnosMatriculados']->value[0]['nacimiento'])===null||$tmp==='' ? "no definida" : $tmp);?>
</p>
                    <p><b>DNI:</b> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['alumnosMatriculados']->value[0]['DNI'])===null||$tmp==='' ? "no definida" : $tmp);?>
</p>

                     
                    <form action="maestra.php" method="get">
                        <p class="botones">   
                            <input type="submit" value="VOLVER" name="volver" class="boton">                    
                        </p>
                    </form>
                </div>


            </div>


        </section>

    </body>
</html>
    <?php }
}
