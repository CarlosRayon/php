<!DOCTYPE html>
<!--
Plantilla html para poner en la platilla smarty
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>

            <p>Muestro un dato simple del array que es {$paises["spain"]} </p>

            <p>Un select/option dentro de un formulario</p>
            <form>
                {* Con esta sentencia crearemos el HTML de un SELECT/OPTION *}
                {html_options options=$paises name=id}
                <input type='hidden' name='action' value='detail' />
                <input type='submit' value='Ver' />
            </form>

            {*Foreach para un array asociativo*}
            {foreach from=$paises item=pais key=key name=propiedades}
                <li>La clave es:{$key} El valor es:{$pais}  El numero ciclo es:{$smarty.foreach.propiedades.iteration}</li>
                {/foreach}

            {*Tabla con colores distintos con smarty *}
            <table>
                {foreach from=$paises item=pais name=propiedades}
                    <tr>
                        {if $smarty.foreach.propiedades.iteration % 2 == 0}
                            <td id='impares' style='background-color:#a894be'>{$pais}</td>
                        {else}
                            <td id='pares' style='background-color:#e5e5e5'>{$pais}</td>
                        {/if}
                    </tr>
                {/foreach}
            </table>
            
            
        </div>
    </body>
</html>
