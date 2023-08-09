<!DOCTYPE html>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Insertar productos</title>
</head>
<body>

	<h1>Insertar un producto:</h1>
	<form name="insertarForm" id="insertarForm" enctype="application/x-www-form-urlencoded" method="post" action="insertar.php">
		<table>
			<tr>
				<td><label for="codigo">C&oacute;digo</label></td>
				<td><input type="text" id="codigo" name="codigo" /></td>
			</tr>
			<tr>
				<td><label for="nombre_corto">Nombre</label></td>
				<td><input type="text" id="nombre_corto" name="nombre" /></td>
			</tr>
			<tr>
				<td><label for="nombre_corto">Nombre corto</label></td>
				<td><input type="text" id="nombre_corto" name="nombre_corto" /></td>
			</tr>
			<tr>
				<td><label for="nombre_corto">Descripcion</label></td>
				<td><input type="text" id="nombre_corto" name="descripcion" /></td>
			</tr>
			<tr>
				<td><label for="precio">Precio</label></td>
				<td><input type="text" id="precio" name="precio" /></td>
			</tr>

			<tr>
				<td><label for="familia">Familia (TV, CONSOL, ..)</label></td>
				<td><input type="text" id="familia" name="familia" /></td>
			</tr>

		</table>


		<div class="form-group">
			<input type="submit" name="insertar" value="Insertar" />
		</div>
	</form>
</body>
</html>