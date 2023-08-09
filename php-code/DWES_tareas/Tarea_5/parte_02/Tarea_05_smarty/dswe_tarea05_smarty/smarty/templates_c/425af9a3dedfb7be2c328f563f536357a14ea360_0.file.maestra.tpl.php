<?php
/* Smarty version 3.1.30, created on 2018-01-24 00:39:34
  from "C:\xampp\htdocs\dswe_tarea05_smarty\smarty\templates\maestra.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties(
    $_smarty_tpl, array (
    'version' => '3.1.30',
    'unifunc' => 'content_5a67c7b6c73959_85918051',
    'has_nocache_code' => false,
    'file_dependency' => 
    array (
    '425af9a3dedfb7be2c328f563f536357a14ea360' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dswe_tarea05_smarty\\smarty\\templates\\maestra.tpl',
      1 => 1516750736,
      2 => 'file',
    ),
    ),
    'includes' => 
    array (
    ),
    ), false
)
) {
    function content_5a67c7b6c73959_85918051(Smarty_Internal_Template $_smarty_tpl)
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
                                <label for="codigo">Codigo Comun:</label>
                                <input type="text" id="codigocomun" name="codigocomun" title="SOLO LETRAS MAYUSCULAS SIN ESPACIOS"  minlength="1" maxlength="10" pattern="[A-ZÑ]+" required>
                            </p>
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
                        
                        <?php echo $_smarty_tpl->tpl_vars['tablamodulos']->value;?>
                            
                    </form>
                </div>
            </div>
        </section>
    </body>
</html><?php }
}
