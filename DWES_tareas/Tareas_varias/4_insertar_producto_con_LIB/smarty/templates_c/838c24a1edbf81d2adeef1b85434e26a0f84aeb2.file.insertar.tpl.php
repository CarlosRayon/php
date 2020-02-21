<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-23 09:56:37
         compiled from ".\templates\insertar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1152854c20cc5eb9554-25209019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '838c24a1edbf81d2adeef1b85434e26a0f84aeb2' => 
    array (
      0 => '.\\templates\\insertar.tpl',
      1 => 1419365180,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1152854c20cc5eb9554-25209019',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'resultado' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54c20cc5f26b74_66611401',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54c20cc5f26b74_66611401')) {function content_54c20cc5f26b74_66611401($_smarty_tpl) {?><!DOCTYPE html>

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
				<td><label for="velocidad">Velocidad</label></td>
				<td><input type="text" id="velocidad" name="velocidad" /></td>
			</tr>
			<tr>
				<td><label for="tipo">Tipo</label></td>
				<td><input type="text" id="tipo" name="tipo" /></td>
			</tr>
			<tr>
				<td><label for="conectores">Conectores</label></td>
				<td><input type="text" id="conectores" name="conectores" /></td>
			</tr>
		</table>
		<div class="form-group">
			<input type="hidden" id="familia" name="familia" value="IMPRES" />
			<input type="hidden" id="cantidad" name="cantidad" value="1" />
		</div>
		<div class="form-group">
			<input type="radio" id="tienda1" name="tienda" value="1" />
			<label for="tienda1">Tienda 1</label>
			<input type="radio" id="tienda2" name="tienda" value="2" />
			<label for="tienda2">Tienda 2</label>
			<input type="radio" id="tienda3" name="tienda" value="3" />
			<label for="tienda3">Tienda 3</label>
		</div>
		<div class="form-group">
			<input type="submit" name="insertar" value="Insertar" />
		</div>
	</form>
</body>
</html><?php }} ?>
