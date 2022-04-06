<?php /* Smarty version Smarty-3.1.16, created on 2016-12-20 23:39:34
         compiled from "smarty\stienda\templates\productoscesta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2117569d394b2dae31-92991674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '409e0609ae935dbe3f86363b4a92d127f96e16b5' => 
    array (
      0 => 'smarty\\stienda\\templates\\productoscesta.tpl',
      1 => 1312153934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2117569d394b2dae31-92991674',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_569d394b34c2c1_78957613',
  'variables' => 
  array (
    'productoscesta' => 0,
    'producto' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569d394b34c2c1_78957613')) {function content_569d394b34c2c1_78957613($_smarty_tpl) {?>    <h3><img src='cesta.png' alt='Cesta' width='24' height='21'> Cesta</h3>
    <hr />
    <?php if (empty($_smarty_tpl->tpl_vars['productoscesta']->value)) {?>
        <p>Cesta vacía</p>
    <?php } else { ?>
        <?php  $_smarty_tpl->tpl_vars['producto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['producto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productoscesta']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->key => $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->_loop = true;
?>
          <p><?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
</p>
        <?php } ?>
    <?php }?>

    <form id='vaciar' action='productos.php' method='post'>
        <?php if (empty($_smarty_tpl->tpl_vars['productoscesta']->value)) {?>
            <input type='submit' name='vaciar' value='Vaciar Cesta' disabled='true' />
        <?php } else { ?>
            <input type='submit' name='vaciar' value='Vaciar Cesta' />
        <?php }?>
    </form>
    <form id='comprar' action='cesta.php' method='post'>
        <?php if (empty($_smarty_tpl->tpl_vars['productoscesta']->value)) {?>
            <input type='submit' name='comprar' value='Comprar' disabled='true' />
        <?php } else { ?>
            <input type='submit' name='comprar' value='Comprar' />
        <?php }?>
    </form> 
<?php }} ?>
