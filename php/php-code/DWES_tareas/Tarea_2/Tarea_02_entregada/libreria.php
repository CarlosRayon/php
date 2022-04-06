<!DOCTYPE html>
<html lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset="utf-8 >
        <title>Libreria</title>

        <?php
        //Un array para el genero y otro para el tipo de envio
        $generos = array("Aventuras", "Dramatico", "Tecnico", "Historico", "Poesia");
        $envio = array("normal", "urgente", "seguro", "reembolso", "fragil");

        //        Defino las variables que usare luego

        $titulo = "";
        $precio = 0;
        $genero = "";
        $enviando = "";
        $tipoLibro = "";
        $resultado = "";

        // LO PRIMERO QUE PENSE LUEGO YA VI QUE MEJOR CON UN foreach() **      
        //        $select = "
        //            <p>Genero:</p> <select name=\"tipo\">
        //                <option value=\"aventuras\">$generos[0]</option>
        //                <option value=\"dramatico\">$generos[1]</option>
        //                <option value=\"tecnico\">$generos[2]</option>
        //                <option value=\"historico\">$generos[3]</option>
        //                <option value=\"poesia\">$generos[4]</option>
        //                  </select>";
        // Formato de envio
        //      $formaEnvio=" <p> 
        //            <input type=\"checkbox\" name=\"envio\" value=\"normal\">Normal
        //            <input type=\"checkbox\" name=\"envio\" value=\"urgente\">Urgente
        //            <input type=\"checkbox\" name=\"envio\" value=\"seguro\">Seguro
        //            <input type=\"checkbox\" name=\"envio\" value=\"reembolso\">Reembolso
        //            <input type=\"checkbox\" name=\"envio\" value=\"fragil\">Fragil
        //            </p>";     

        //Compruebo cuando se a pulsado el boton de confirmar del formulario
        if (isset($_POST["confirmar"])) {//si pulso confimar
            //capturo los datos
            $titulo = $_POST["titulo"];
            $precio = $_POST["precio"];
            $genero = $_POST["tipo"];
            $enviando = $_POST["envio"];
            $tipoLibro = $_POST["encuadernacion"];
            $total = 0;

            
            
            //Creo dos funciones usando los datos. Una para calcular el precio. Otra para mostrar los datos
            function calculoPrecio($precio)
            {
                global $enviando;
                global $total;
                $total += ($precio + (count($enviando) * 2)) + (($precio + (count($enviando) * 2)) * 0.12);
                return $total;
            }

            function mostra()
            {

                global $titulo;
                global $precio;
                global $genero;
                global $tipoLibro;
                global $enviando;
                global $resultado;
                $resultado = "<b>El libro $titulo de genero $genero en formato $tipoLibro tiene un precio de $precio euros<br> Sera enviado de forma";
                foreach ($enviando as $value) {
                    $resultado .= " $value ";
                }
                $resultado .= "y tendra un coste total de " . calculoPrecio($precio) . "</b>";
                echo $resultado;
            }

            //al final muestro los datos mediante la funcion
            mostra();
        }
        ?>

    </head>


    <body>
        <div align="center">

            <!--Empiezo el formulario-->
            <form action="libreria.php" method="post" name="formulario" id="formulario">
                <p>Titulo:</p> <input type="text" name="titulo" placeholder="Titulo del libro" required="Llene el campo" />
                <!--Pongo type="number" para que no me deje escribir texto. Solo numeros-->
                <p>Precio:</p> <input type="number" name="precio" placeholder="Precio del libro" required="Llene el campo" />

                <!--imprimo el selector de genero y el formato de Envio que seran generados de forma dinamica por PHP-->
                <?php
                $ti = "<p><p>Genero:</p>
                 <select name=\"tipo\">";
                
                foreach ($generos as $value) {
                    $ti .= "<option value=\"aventuras\">$value</option>";
                }

                $ti .= "</select></p>";
                echo $ti;

                //echo $formaEnvio;**
                foreach ($envio as $value) {
                    
                    echo "<input type=\"checkbox\" name=\"envio[]\" value=\"$value\">$value";
                }
                ?>
                <!--Botones Radio-->
                <p>
                    <input type="radio" name="encuadernacion" value="bolsillo" checked>Bolsillo
                    <input type="radio" name="encuadernacion" value="espiral">Espiral
                    <input type="radio" name="encuadernacion" value="estandar">Estandar
                </p>

                <!--Area de texto-->
                <p>Comentario:</p>
                <textarea cols="40" rows="10" name="comentario" placeholder="Deje sus comentarios">
                </textarea>
                <p><INPUT TYPE=SUBMIT NAME="confirmar" VALUE="confirmar"></p>

            </form>

            <?php ?>


        </div>
    </body>




</html>




