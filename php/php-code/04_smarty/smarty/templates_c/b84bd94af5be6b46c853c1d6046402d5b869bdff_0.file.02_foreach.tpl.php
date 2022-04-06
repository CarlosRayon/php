<?php
/* Smarty version 3.1.30, created on 2018-03-03 23:45:04
  from "C:\xampp\htdocs\PHP\PHP\04_smarty\smarty\templates\02_foreach.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties(
    $_smarty_tpl, array (
    'version' => '3.1.30',
    'unifunc' => 'content_5a9b2570c20397_60303784',
    'has_nocache_code' => false,
    'file_dependency' => 
    array (
    'b84bd94af5be6b46c853c1d6046402d5b869bdff' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP\\PHP\\04_smarty\\smarty\\templates\\02_foreach.tpl',
      1 => 1520117104,
      2 => 'file',
    ),
    ),
    'includes' => 
    array (
    ),
    ), false
)
) {
    function content_5a9b2570c20397_60303784(Smarty_Internal_Template $_smarty_tpl)
    {
        if (!is_callable('smarty_function_html_options')) { include_once 'C:\\xampp\\htdocs\\PHP\\PHP\\04_smarty\\smarty\\libs\\plugins\\function.html_options.php';
        }
        ?>
<!DOCTYPE html>
<!--
Plantilla html para poner en la platilla smarty
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>

            <p>Muestro un dato simple del array que es <?php echo $_smarty_tpl->tpl_vars['paises']->value["spain"];?>
 </p>

            <p>Un select/option dentro de un formulario</p>
            <form>
                
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['paises']->value,'name'=>'id'), $_smarty_tpl);?>

                <input type='hidden' name='action' value='detail' />
                <input type='submit' value='Ver' />
            </form>

            
            <?php
            $_from = $_smarty_tpl->smarty->ext->_foreach->init(
                $_smarty_tpl, $_smarty_tpl->tpl_vars['paises']->value, 'pais', false, 'key', 'propiedades', array (
                'iteration' => true,
                )
            );
            if ($_from !== null) {
                foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['pais']->value) {
                    $_smarty_tpl->tpl_vars['__smarty_foreach_propiedades']->value['iteration']++;
                    ?>
                <li>La clave es:<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 El valor es:<?php echo $_smarty_tpl->tpl_vars['pais']->value;?>
  El numero ciclo es:<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_propiedades']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_propiedades']->value['iteration'] : null);?>
</li>
                    <?php
                }
            }
            $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
            ?>


            
            <table>
                <?php
                $_from = $_smarty_tpl->smarty->ext->_foreach->init(
                    $_smarty_tpl, $_smarty_tpl->tpl_vars['paises']->value, 'pais', false, null, 'propiedades', array (
                    'iteration' => true,
                    )
                );
                if ($_from !== null) {
                    foreach ($_from as $_smarty_tpl->tpl_vars['pais']->value) {
                        $_smarty_tpl->tpl_vars['__smarty_foreach_propiedades']->value['iteration']++;
                        ?>
                    <tr>
                        <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_propiedades']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_propiedades']->value['iteration'] : null)%2 == 0) {?>
                            <td id='impares' style='background-color:#a894be'><?php echo $_smarty_tpl->tpl_vars['pais']->value;?>
</td>
                        <?php } else { ?>
                            <td id='pares' style='background-color:#e5e5e5'><?php echo $_smarty_tpl->tpl_vars['pais']->value;?>
</td>
                        <?php }?>
                    </tr>
                        <?php
                    }
                }
                $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
                ?>

            </table>
            
            
        </div>
    </body>
</html>
    <?php }
}
