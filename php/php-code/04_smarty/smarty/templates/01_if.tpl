<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>

            <p>Datos mostrados con smarty</p>
                {*Comprobamos el if*}<!--Comentario smarty-->
            {if $variableNumero > 3}
                <p>La variable Numero es mayor de 3 por que es {$variableNumero}</p>
            {else} <!--Tambien puede ser {elseif}  -->
                <p>{$variableString}</p>  
            {/if}
            
            


        </div>
    </body>
</html>