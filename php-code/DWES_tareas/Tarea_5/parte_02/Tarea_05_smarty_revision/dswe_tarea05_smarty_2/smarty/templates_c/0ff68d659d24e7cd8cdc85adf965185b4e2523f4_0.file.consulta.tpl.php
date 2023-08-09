<?php
/* Smarty version 3.1.30, created on 2018-02-04 20:41:43
  from "C:\xampp\htdocs\dswe_tarea05_smarty_2\smarty\templates\consulta.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties(
    $_smarty_tpl, array (
    'version' => '3.1.30',
    'unifunc' => 'content_5a7761f7283a85_11845330',
    'has_nocache_code' => false,
    'file_dependency' => 
    array (
    '0ff68d659d24e7cd8cdc85adf965185b4e2523f4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dswe_tarea05_smarty_2\\smarty\\templates\\consulta.tpl',
      1 => 1517773264,
      2 => 'file',
    ),
    ),
    'includes' => 
    array (
    ),
    ), false
)
) {
    function content_5a7761f7283a85_11845330(Smarty_Internal_Template $_smarty_tpl)
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
                 
                <?php if ($_smarty_tpl->tpl_vars['modulo']->value[0]['ciclo'] == 'COM') {?>
                    <div id="modulocomun">    
                        <div id="botones">
                            <h3>Modificar Modulo comun <?php echo $_smarty_tpl->tpl_vars['modulo']->value[0]['nombre'];?>
</h3>
                            <form id="formulario" action="consulta.php" method="get">
                                <h3>Datos del modulo</h3>           
                                <p> 
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" id="nombre" name="nombre" value="<?php echo $_smarty_tpl->tpl_vars['modulo']->value[0]['nombre'];?>
" title="SOLO LETRAS"  minlength="1" maxlength="50" pattern="[A-ZÑa-zñ ]+" required>
                                </p>

                                <p> 
                                    <label for="horas">Horas:</label>
                                    <input type="text" id="horas" name="horas" value="<?php echo $_smarty_tpl->tpl_vars['modulo']->value[0]['horas'];?>
" title="SOLO NUMEROS"  minlength="1" maxlength="3" pattern="[0-9]+" required>
                                </p>

                                <p> 
                                    <label for="curso">Curso:</label>
                                    <input type="text" id="curso" name="curso" value="<?php echo $_smarty_tpl->tpl_vars['modulo']->value[0]['curso'];?>
" title="SOLO NUMEROS 1 o 2"  minlength="1" maxlength="1" pattern="[1-2]+" required>
                                </p>
                                <p> 
                                    <label for="plazas">Plazas:</label>
                                    <input type="text" id="plazas" name="plazas" value="<?php echo $_smarty_tpl->tpl_vars['modulo']->value[0]['plazas'];?>
" title="SOLO NUMEROS MAXIMO 30"  minlength="1" maxlength="2" pattern="[0-3]+" required>
                                </p>

                                <p>
                                    <label for="departamento">Departamento:</label>
                                    <input type="text" id="departamento" name="departamento" value="<?php echo $_smarty_tpl->tpl_vars['modulo']->value[1]['departamento'];?>
" title="SOLO LETRAS"  minlength="1" maxlength="20" pattern="[A-ZÑa-zñ ]+" required>
                                </p>
                                <p class="botones">   
                                    <input type="submit" value="MODIFICAR" name="modificar" class="boton">                    
                                </p>
                            </form>
                        </div>
                        <form action="maestra.php" method="get">
                            <p class="botones">   
                                <input type="submit" value="VOLVER" name="volver" class="boton">                    
                            </p>
                        </form>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['modulo']->value[0]['ciclo'] != 'COM') {?>
                    <h3>Datos del modulo</h3>
                    <ul>
                        <li><b>Nombre:</b><?php echo $_smarty_tpl->tpl_vars['modulo']->value[0]['nombre'];?>
</li>
                        <li><b>Horas:</b><?php echo $_smarty_tpl->tpl_vars['modulo']->value[0]['horas'];?>
</li>
                        <li><b>Curso:</b><?php echo $_smarty_tpl->tpl_vars['modulo']->value[0]['curso'];?>
</li>
                        <li><b>Plazas:</b><?php echo $_smarty_tpl->tpl_vars['modulo']->value[0]['plazas'];?>
</li>
                        <li><b>Departamento:</b><?php echo $_smarty_tpl->tpl_vars['modulo']->value[1]['departamento'];?>
</li>
                    </ul>     

                    <div id="alumnosmatriculado">                    
                        <h3>Relación de alumnos matriculados</h3> 
                        <table width="100%" border="3">
                            <tr><td>Nombre</td><td>Sexo</td><td>Nacimiento</td><td>DNI</td><td>Fichero</td></tr>
                            
                            <?php
                            $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['alumnos']->value, 'alumno');
                            if ($_from !== null) {
                                foreach ($_from as $_smarty_tpl->tpl_vars['alumno']->value) {
                                    ?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['alumno']->value->getNombreAlumno();?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['alumno']->value->getSexoAlumno();?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['alumno']->value->getFechaNacimiento();?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['alumno']->value->getDniAlumno();?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['alumno']->value->getArchivoAlumno();?>
</td>
                                </tr>
                                    <?php
                                }
                            }
                            $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
                            ?>

                        </table>
                        <form action="maestra.php" method="get">
                            <p class="botones">   
                                <input type="submit" value="VOLVER" name="volver" class="boton">                    
                            </p>
                        </form>
                    </div>
                <?php }?>
            </div>
        </section>
    </body>
</html>
    <?php }
}
