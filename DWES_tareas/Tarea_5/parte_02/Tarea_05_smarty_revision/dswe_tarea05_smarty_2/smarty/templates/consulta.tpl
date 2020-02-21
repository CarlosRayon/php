<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>consulta.tpl</title>
        <link type="text/css" rel="stylesheet" href="CSS/nueva.css">
    </head>
    <body>
        <header>
            <h2>2.Seleccion de los modulos</h2>
        </header>
        <section>
            <div id="modulos">
                {*Formulario con el que podemos modificar los modulos comunes*} 
                {if $modulo[0]['ciclo'] == 'COM'}{*Si es comum mostramos el formulario de modificacion*}
                    <div id="modulocomun">    
                        <div id="botones">
                            <h3>Modificar Modulo comun {$modulo[0]['nombre']}</h3>
                            <form id="formulario" action="consulta.php" method="get">
                                <h3>Datos del modulo</h3>           
                                <p> 
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" id="nombre" name="nombre" value="{$modulo[0]['nombre']}" title="SOLO LETRAS"  minlength="1" maxlength="50" pattern="[A-ZÑa-zñ ]+" required>
                                </p>

                                <p> 
                                    <label for="horas">Horas:</label>
                                    <input type="text" id="horas" name="horas" value="{$modulo[0]['horas']}" title="SOLO NUMEROS"  minlength="1" maxlength="3" pattern="[0-9]+" required>
                                </p>

                                <p> 
                                    <label for="curso">Curso:</label>
                                    <input type="text" id="curso" name="curso" value="{$modulo[0]['curso']}" title="SOLO NUMEROS 1 o 2"  minlength="1" maxlength="1" pattern="[1-2]+" required>
                                </p>
                                <p> 
                                    <label for="plazas">Plazas:</label>
                                    <input type="text" id="plazas" name="plazas" value="{$modulo[0]['plazas']}" title="SOLO NUMEROS MAXIMO 30"  minlength="1" maxlength="2" pattern="[0-3]+" required>
                                </p>

                                <p>
                                    <label for="departamento">Departamento:</label>
                                    <input type="text" id="departamento" name="departamento" value="{$modulo[1]['departamento']}" title="SOLO LETRAS"  minlength="1" maxlength="20" pattern="[A-ZÑa-zñ ]+" required>
                                </p>
                                <p class="botones">   
                                    <input type="submit" value="MODIFICAR" name="modificar" class="boton">                    
                                </p>
                            </form>
                        </div>
                        <form action="maestra.php" method="get">
                            <p class="botones">   
                                <input type="submit" value="VOLVER" name="volver" class="boton">                    
                            </p>
                        </form>
                    </div>
                {/if}

                {if $modulo[0]['ciclo'] != 'COM'}{*Si NO es modulo comun mostramos datos del modulo y los alumnos matriculados*}
                    <h3>Datos del modulo</h3>
                    <ul>
                        <li><b>Nombre:</b>{$modulo[0]['nombre']}</li>
                        <li><b>Horas:</b>{$modulo[0]['horas']}</li>
                        <li><b>Curso:</b>{$modulo[0]['curso']}</li>
                        <li><b>Plazas:</b>{$modulo[0]['plazas']}</li>
                        <li><b>Departamento:</b>{$modulo[1]['departamento']}</li>
                    </ul>     

                    <div id="alumnosmatriculado">                    
                        <h3>Relación de alumnos matriculados</h3> 
                        <table width="100%" border="3">
                            <tr><td>Nombre</td><td>Sexo</td><td>Nacimiento</td><td>DNI</td><td>Fichero</td></tr>
                            {*Listado de alumnos matriculados*}
                            {foreach from=$alumnos item=alumno}
                                <tr>
                                    <td>{$alumno->getNombreAlumno()}</td>
                                    <td>{$alumno->getSexoAlumno()}</td>
                                    <td>{$alumno->getFechaNacimiento()}</td>
                                    <td>{$alumno->getDniAlumno()}</td>
                                    <td>{$alumno->getArchivoAlumno()}</td>
                                </tr>
                            {/foreach}
                        </table>
                        <form action="maestra.php" method="get">
                            <p class="botones">   
                                <input type="submit" value="VOLVER" name="volver" class="boton">                    
                            </p>
                        </form>
                    </div>
                {/if}
            </div>
        </section>
    </body>
</html>
