<?php

/*
  Clase de metodos estaticos
 */

class Estaticos
{
    
    /* Metodo para mostrar la lista de modulos en una tabla con colores combinados
      @arguments {Array} array con los datos de todos los modulos
     * @return {String} */

    public static function mostrarModulos($arrayModulos)
    {

        $tablaModulos = "<table border='1'>"; //Creo la tabla
        for ($i = 0; $i < count($arrayModulos); $i++) {
            $tablaModulos .= "<tr>";
            if ($i % 2 == 0) {
                $tablaModulos .= "<td id='impares' style='background-color:#a894be'>" . $arrayModulos[$i]["cod"] . "  " . $arrayModulos[$i]["nombre"] . "</td>";
                $tablaModulos .= "<td><input type='submit' id='" . $arrayModulos[$i]["cod"] . "' name='consultar' value='" . $arrayModulos[$i]["cod"] . "'>";
            } else {
                $tablaModulos .= "<td id='pares' style='background-color:#e5e5e5'>" . $arrayModulos[$i]["cod"] . "  " . $arrayModulos[$i]["nombre"] . " </td>";
                $tablaModulos .= "<td><input type='submit' id='" . $arrayModulos[$i]["cod"] . "' name='consultar' value='" . $arrayModulos[$i]["cod"] . "'>";
            }
            $tablaModulos .= "</tr>";
        }
        $tablaModulos .= "</table>";
        return $tablaModulos;
    }
    /*Metodo para mostras una lista con los datos del modulo
     * @arguments {Array} Array con los datos del modulo
     * @return {String}
     */

    public static function datosModulo($arrayModulo)
    {

        $datoModulo = "<h3>Datos introduccidos en el modulo comun</h3>";
        $datoModulo .= "<ul>
                    <li><b>Nombre:</b> " . $arrayModulo[0]['nombre'] . "</li>
                    <li><b>Horas:</b> " . $arrayModulo[0]['horas'] . "</li>
                    <li><b>Curso:</b>" . $arrayModulo[0]['curso'] . "</li>
                    <li><b>Plazas:</b>" . $arrayModulo[0]['plazas'] . "</li>
                    <li><b>Departamento:</b> " . $arrayModulo[1]['departamento'] . "</li>
                    </ul>";

        return $datoModulo;
    }
    
    /*Metodo para mostrar el formulario para modificar un modulo comun
     * @arguments {String} cod de un modulo
     * @return {String}
     */

    public static function formularioModificarModulo($codigoModulo)
    {
        $formularioModificar = '<div id="modulocomun">    
                     <div id="botones">
                       <h3>Modificar Modulo comun ' . $codigoModulo . '</h3>
                           <form id="formulario" action="consulta.php" method="get">

                            <h3>Datos del modulo</h3>
                          
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
                            <!--
                            <p> 
                                <label for="codigo">Codigo Comun:</label>
                                <input type="text" id="codigocomun" name="codigocomun" title="SOLO LETRAS MAYUSCULAS SIN ESPACIOS"  minlength="1" maxlength="10" pattern="[A-ZÑ]+" required>
                            </p>
                            -->
                            
                            <p>
                                <label for="departamento">Departamento:</label>
                                <input type="text" id="departamento" name="departamento" title="SOLO LETRAS"  minlength="1" maxlength="20" pattern="[A-ZÑa-zñ ]+" required>
                            </p>

                            <p class="botones">   
                                <input type="submit" value="MODIFICAR" name="modificar" class="boton">                    
                            </p>
                        </form>
                        </div>
                    </div>';

        return $formularioModificar;
    }

}
