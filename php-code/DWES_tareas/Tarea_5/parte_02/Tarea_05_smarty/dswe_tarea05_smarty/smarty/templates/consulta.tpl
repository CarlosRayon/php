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
                {*No he encontrado como probar si esta definida esta variable
                para en caso no estarlo no mostrar nada.
                He probado con if tambien pero no he lo he conseguido*}

                {$datosModulo|default:"no definida"}
                {$formularioModificar|default:"no definida"}



                <div id="alumnosmatriculado">                    
                    <h3>Relación de alumnos matriculados</h3>          

                    {*Lista de alumnos con contador igual a contador lista matricula*} 
                    {*Lo correcto seria hacer un for para mostrar todos los alumnos pero no lo consigo :(*} 

                    <p><b>Nombre:</b> {$alumnosMatriculados[0].alumno|default:"no definida"}</p>
                    <p><b>Sexo:</b> {$alumnosMatriculados[0].sexo|default:"no definida"}</p>
                    <p><b>Nacimiento:</b> {$alumnosMatriculados[0].nacimiento|default:"no definida"}</p>
                    <p><b>DNI:</b> {$alumnosMatriculados[0].DNI|default:"no definida"}</p>

                    {*He intentado esto y tampoco
                    {foreach key=key item=item from=$alumnosMatriculados}
                    {$key}: {$item}<br />
                    {/foreach}
                    *} 
                    <form action="maestra.php" method="get">
                        <p class="botones">   
                            <input type="submit" value="VOLVER" name="volver" class="boton">                    
                        </p>
                    </form>
                </div>


            </div>


        </section>

    </body>
</html>
