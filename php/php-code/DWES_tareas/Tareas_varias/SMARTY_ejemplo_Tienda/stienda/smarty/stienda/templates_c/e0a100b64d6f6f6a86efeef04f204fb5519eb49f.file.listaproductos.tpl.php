<?php /* Smarty version Smarty-3.1.16, created on 2016-12-20 23:39:34
         compiled from "smarty\stienda\templates\listaproductos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15258569d394b35bcd9-35415669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0a100b64d6f6f6a86efeef04f204fb5519eb49f' => 
    array (
      0 => 'smarty\\stienda\\templates\\listaproductos.tpl',
      1 => 1312153848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15258569d394b35bcd9-35415669',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_569d394b3c5465_15151455',
  'variables' => 
  array (
    'productos' => 0,
    'producto' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569d394b3c5465_15151455')) {function content_569d394b3c5465_15151455($_smarty_tpl) {?>    <?php  $_smarty_tpl->tpl_vars['producto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['producto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->key => $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->_loop = true;
?>
        <p><form id='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
' action='productos.php' method='post'>
        <input type='hidden' name='cod' value='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
'/>
        <input type='submit' name='enviar' value='Añadir'/>
        <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>
: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros.</form></p>
    <?php } ?>
<?php }} ?>
