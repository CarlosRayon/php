<?php
/* Smarty version 3.1.30, created on 2018-02-04 20:31:51
  from "C:\xampp\htdocs\dswe_tarea05_smarty_2\smarty\templates\maestra.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties(
    $_smarty_tpl, array (
    'version' => '3.1.30',
    'unifunc' => 'content_5a775fa7895366_24298597',
    'has_nocache_code' => false,
    'file_dependency' => 
    array (
    '0221830baa8cb11354a33a645cb32111ab48079a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dswe_tarea05_smarty_2\\smarty\\templates\\maestra.tpl',
      1 => 1517772703,
      2 => 'file',
    ),
    ),
    'includes' => 
    array (
    ),
    ), false
)
) {
    function content_5a775fa7895366_24298597(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>maestra.tpl</title>
        <link type="text/css" rel="stylesheet" href="CSS/nueva.css">
    </head>
    <body>
        <header>
            <h2>2.Seleccion de los modulos</h2>
        </header>

        <section>
            <div id="modulos">

                <div id="modulocomun">
                    <h3>Modulo común</h3>

                    <div id="botones">
                        <form id="formulario" action="maestra.php" method="get">

                            <h3>Datos del modulo</h3>
                            <p> 
                                <label for="cod">Codigo:</label>
                                <input type="text" id="codigo" name="codigo" title="SOLO LETRAS MAYUSCULAS SIN ESPACIOS"  minlength="1" maxlength="10" pattern="[A-ZÑ]+" required>
                            </p>

                            <p> 
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" title="SOLO LETRAS"  minlength="1" maxlength="50" pattern="[A-ZÑa-zñ ]+" required>
                            </p>

                            <p> 
                                <label for="horas">Horas:</label>
                                <input type="text" id="horas" name="horas" title="SOLO NUMEROS"  minlength="1" maxlength="3" pattern="[0-9]+" required>
                            </p>

                            <p> 
                                <label for="curso">Curso:</label>
                                <input type="text" id="curso" name="curso" title="SOLO NUMEROS 1 o 2"  minlength="1" maxlength="1" pattern="[1-2]+" required>
                            </p>

                            <p> 
                                <label for="plazas">Plazas:</label>
                                <input type="text" id="plazas" name="plazas" title="SOLO NUMEROS MAXIMO 30"  minlength="1" maxlength="2" pattern="[0-3]+" required>
                            </p>

                            <h2>Datos de modulo comun</h2>

                            <p>
                                <label for="departamento">Departamento:</label>
                                <input type="text" id="departamento" name="departamento" title="SOLO LETRAS"  minlength="1" maxlength="20" pattern="[A-ZÑa-zñ ]+" required>
                            </p>

                            <p class="botones">   
                                <input type="submit" value="ENVIAR" name="enviar" class="boton">                    
                            </p>
                        </form>
                    </div>
                </div>

                <div id="modulo">
                    <h3>Relación de modulos</h3>
                    <form id="formularioModulos" action="consulta.php" method="get">

                        <table border='1'>
                            <?php
                            $_from = $_smarty_tpl->smarty->ext->_foreach->init(
                                $_smarty_tpl, $_smarty_tpl->tpl_vars['modulos']->value, 'value', false, null, 'tablamodulos', array (
                                'iteration' => true,
                                )
                            );
                            if ($_from !== null) {
                                foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
                                    $_smarty_tpl->tpl_vars['__smarty_foreach_tablamodulos']->value['iteration']++;
                                    ?>
                                <tr>
                                    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_tablamodulos']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tablamodulos']->value['iteration'] : null)%2 == 0) {?>
                                        <td id='impares' style='background-color:#a894be'><?php echo $_smarty_tpl->tpl_vars['value']->value->getCod();?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['value']->value->getNombre();?>
</td>
                                        <td><a href="consulta.php?consultar=<?php echo $_smarty_tpl->tpl_vars['value']->value->getCod();?>
">Consultar</a></td>
                                    <?php } else { ?>
                                        <td id='pares' style='background-color:#e5e5e5'><?php echo $_smarty_tpl->tpl_vars['value']->value->getCod();?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['value']->value->getNombre();?>
</td>
                                        <td><a href=consulta.php?consultar=<?php echo $_smarty_tpl->tpl_vars['value']->value->getCod();?>
>Consultar</a></td>
                                    <?php }?>
                                </tr>
                                    <?php
                                }
                            }
                            $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
                            ?>

                        </table>
                    </form>
                </div>

            </div>
        </section>
    </body>
</html><?php }
}
