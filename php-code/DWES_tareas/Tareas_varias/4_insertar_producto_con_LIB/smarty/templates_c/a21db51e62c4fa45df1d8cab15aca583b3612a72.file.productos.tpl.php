<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-23 10:05:23
         compiled from ".\templates\productos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1961754c20ed3387078-61577225%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a21db51e62c4fa45df1d8cab15aca583b3612a72' => 
    array (
      0 => '.\\templates\\productos.tpl',
      1 => 1419278952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1961754c20ed3387078-61577225',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'checkedTienda1' => 0,
    'checkedTienda2' => 0,
    'checkedTienda3' => 0,
    'resultado' => 0,
    'prod' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54c20ed3465b35_66009004',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54c20ed3465b35_66009004')) {function content_54c20ed3465b35_66009004($_smarty_tpl) {?><!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Tarea Unidad 5 (Parte 1)</title>       
    </head>
    <body>        

        <h1>Listado de productos:</h1>
        <form name="tiendasForm" id="tiendasForm" enctype="application/x-www-form-urlencoded" method="post" action="productos.php">
	        <div class="form-group">
        		<input type="radio" id="tienda1" name="tienda" value="1"<?php echo $_smarty_tpl->tpl_vars['checkedTienda1']->value;?>
 />
        		<label for="tienda1">Tienda 1</label>
        		<input type="radio" id="tienda2" name="tienda" value="2"<?php echo $_smarty_tpl->tpl_vars['checkedTienda2']->value;?>
 />
        		<label for="tienda2">Tienda 2</label>
        		<input type="radio" id="tienda3" name="tienda" value="3"<?php echo $_smarty_tpl->tpl_vars['checkedTienda3']->value;?>
 />
        		<label for="tienda3">Tienda 3</label>
        	</div>
        	<div class="form-group">
        		<input type="submit" name="tiendas" value="listar" />
        	</div>
        </form>
        <hr/>
        <h3><img src='cesta.png'/>Cesta de la compra: </h3><br/>
        <!-- Mostramos el contenido en todo momento -->
        <?php echo $_smarty_tpl->smarty->registered_objects['cesta'][0]->muestra(array(),$_smarty_tpl);?>

        <form action='productos.php' method='post' >
            <input type="submit" name="vaciar" value="Vaciar Cesta"></input>
            <input type="submit" name="pagar" value="Comprar"></input>                
        </form>
        <hr/>
			<?php  $_smarty_tpl->tpl_vars['prod'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['prod']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['resultado']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['prod']->key => $_smarty_tpl->tpl_vars['prod']->value) {
$_smarty_tpl->tpl_vars['prod']->_loop = true;
?>
				<form action="productos.php" method="post">
					<input type="submit" name="aniadir" value="Añadir" />
					<input type="hidden" name="codigo" value="<?php echo $_smarty_tpl->tpl_vars['prod']->value->getcodigo();?>
" />
					<?php if ($_smarty_tpl->tpl_vars['prod']->value->getFamilia()=='IMPRES') {?>
						<label><a href="./datos_impresora.php?p=<?php echo $_smarty_tpl->tpl_vars['prod']->value->getcodigo();?>
" title=""><?php echo $_smarty_tpl->tpl_vars['prod']->value->getnombrecorto();?>
 : <?php echo $_smarty_tpl->tpl_vars['prod']->value->getPVP();?>
</a></label><br/>
					<?php } else { ?>
						<label><?php echo $_smarty_tpl->tpl_vars['prod']->value->getnombrecorto();?>
 : <?php echo $_smarty_tpl->tpl_vars['prod']->value->getPVP();?>
</label><br/>
					<?php }?>
				</form>
			<?php } ?>
</body>
</html><?php }} ?>
