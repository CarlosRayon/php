<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-01-17 23:57:42
         compiled from "smarty\templates\insertar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:308985a5fd4e67350e9-85126264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f11024d901d6331f857cf32528aa13762188dc8' => 
    array (
      0 => 'smarty\\templates\\insertar.tpl',
      1 => 1516229624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '308985a5fd4e67350e9-85126264',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'resultado' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a5fd4e68bbb36_00033197',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a5fd4e68bbb36_00033197')) {function content_5a5fd4e68bbb36_00033197($_smarty_tpl) {?><!DOCTYPE html>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Tarea Unidad 5 (Parte 1)</title>
</head>
<body>
	<?php if (isset($_smarty_tpl->tpl_vars['resultado']->value)) {?>
		<span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['resultado']->value;?>
</span>
	<?php }?>
	<h1>Insertar un producto:</h1>
	<form name="insertarForm" id="insertarForm" enctype="application/x-www-form-urlencoded" method="post" action="insertar.php">
		<table>
			<tr>
				<td><label for="codigo">C&oacute;digo</label></td>
				<td><input type="text" id="codigo" name="codigo" /></td>
			</tr>
			<tr>
				<td><label for="nombre">Nombre</label></td>
				<td><input type="text" id="nombre" name="nombre" /></td>
			</tr>
			<tr>
				<td><label for="nombre_corto">Nombre corto</label></td>
				<td><input type="text" id="nombre_corto" name="nombre_corto" /></td>
			</tr>
			<tr>
				<td><label for="precio">Precio</label></td>
				<td><input type="text" id="precio" name="precio" /></td>
			</tr>

			<tr>
				<td><label for="familia">Familia</label></td>
				<td><input type="text" id="familia" name="familia" /></td>
			</tr>

		</table>


		<div class="form-group">
			<input type="submit" name="insertar" value="Insertar" />
		</div>
	</form>
</body>
</html><?php }} ?>
