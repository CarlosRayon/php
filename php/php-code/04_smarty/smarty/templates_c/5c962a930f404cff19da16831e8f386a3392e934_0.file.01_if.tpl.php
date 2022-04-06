<?php
/* Smarty version 3.1.30, created on 2018-03-03 22:47:53
  from "C:\xampp\htdocs\PHP\PHP\04_smarty\smarty\templates\01_if.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties(
    $_smarty_tpl, array (
    'version' => '3.1.30',
    'unifunc' => 'content_5a9b180961c9a8_56034137',
    'has_nocache_code' => false,
    'file_dependency' => 
    array (
    '5c962a930f404cff19da16831e8f386a3392e934' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP\\PHP\\04_smarty\\smarty\\templates\\01_if.tpl',
      1 => 1520113673,
      2 => 'file',
    ),
    ),
    'includes' => 
    array (
    ),
    ), false
)
) {
    function content_5a9b180961c9a8_56034137(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>

            <p>Datos mostrados con smarty</p>
                <!--Comentario smarty-->
            <?php if ($_smarty_tpl->tpl_vars['variableNumero']->value > 3) {?>
                <p>La variable Numero es mayor de 3 por que es <?php echo $_smarty_tpl->tpl_vars['variableNumero']->value;?>
</p>
            <?php } else { ?>
                <p><?php echo $_smarty_tpl->tpl_vars['variableString']->value;?>
</p>  
            <?php }?>
            
            


        </div>
    </body>
</html><?php }
}
