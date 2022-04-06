<?php

/*
  Clase con metodos estaticos utiles en diferentes partes del programa
 */

class Estaticos
{
    /* Metodo que muestra el formulario inicial de POO_paso1
     * @argument {Array} Array con los ciclos obtenidos de la base de datos
     */
    public static function formularioInicialPaso1($ciclos)
    {

        $formulario = '<form id="formulario" action="POO_paso2.php" method="get">';
        $formulario .= '<p><strong>Año academico:</strong> 2017-2018</p>';
        $formulario .= '<p>                  
                             <label for="apellido">Primer apellido:</label>
                             <input type="apellido" id="apellido" name="apellido" required ><span>*</span>

                            <label for="nombre">Nombre:</label>
                             <input type="text" id="nombre" name="nombre" required><span>*</span>
                            </p>';

        $formulario .= '<p>
                            <label for="fechanacimiento">Fecha de nacimiento:</label>
                            <input type="date" id="fechanacimiento" name="fechanacimiento" required><span>*</span>

                            <label for="sexo">Sexo:</label>
                            <span>Hombre</span><input type="radio"  name="sexo" value="hombre" checked>
                            <span>Mujer</span><input type="radio"  name="sexo" value="mujer">
                          </p>';

        $formulario .= '<p>
                            <label for="dni">DNI o equivalente:</label>
                            <input type="text" id="dni" name="dni" required>
                        </p>';

        $formulario .= '<p>
                             <label for="cicloformativo">Ciclo formativo:</label>
                             <select id="cicloformativo" name="cicloformativo">';

        for ($i = 0; $i < count($ciclos); $i++) {
            $formulario .= '<option value="' . $ciclos[$i]["cod"] . '">' . $ciclos[$i]["cod"] . '</option>';
        };

        $formulario .= '</select>     
                          </p>';

        $formulario .= '   <p class="botones">
                    <input type="submit" id="irpaso2" class="boton" name="irpaso2" value="Ir al paso 2">
                </p>
            </form>';

        echo $formulario;
    }

    /* Metodo que muestra un formulario con los valores del objeto alumno creado
     *  -Para mostrar al pulsar volver del POO_paso2 y mantener los datos del alumno en lo input
     * @argument {Objetos} Objeto del tipo Alumno que sera de donde saquemos los datos
     */

    public static function formularioDevueltaPaso1($objetoAlumno, $ciclos)
    {
        //Para validar el sexo 
        $sexo = $objetoAlumno->getSexoAlumno();
        if ($sexo == "hombre") {
            $hombre = "checked=''";
            $mujer = "";
        } else {
            $hombre = "";
            $mujer = "checked=''";
        }

        //El resto datos los obtenemos directamente del objeto
        $formulario = '<form id="formulario" action="POO_paso2.php" method="get">';
        $formulario .= '<p><strong>Año academico:</strong> 2017-2018</p>';
        $formulario .= '<p>                  
                             <label for="apellido">Primer apellido:</label>
                             <input type="apellido" id="apellido" name="apellido" value="' . $objetoAlumno->getApellidoAlumno() . '" required ><span>*</span>

                            <label for="nombre">Nombre:</label>
                             <input type="text" id="nombre" name="nombre" value="' . $objetoAlumno->getNombreAlumno() . '" required><span>*</span>
                            </p>';

        $formulario .= '<p>
                            <label for="fechanacimiento">Fecha de nacimiento:</label>
                            <input type="date" id="fechanacimiento" name="fechanacimiento" value="' . $objetoAlumno->getFechaNacimiento() . '"required ><span>*</span>

                            <label for="sexo">Sexo:</label>
                            <span>Hombre</span><input type="radio"  name="sexo" value="hombre" ' . $hombre . '>
                            <span>Mujer</span><input type="radio"  name="sexo" value="mujer" ' . $mujer . '>
                          </p>';

        $formulario .= '<p>
                            <label for="dni">DNI o equivalente:</label>
                            <input type="text" id="dni" name="dni" value="' . $objetoAlumno->getDniAlumno() . '"required>
                        </p>';

        $formulario .= '<p>
                             <label for="cicloformativo">Ciclo formativo:</label>
                             <select id="cicloformativo" name="cicloformativo">';

        for ($i = 0; $i < count($ciclos); $i++) {
            $formulario .= '<option value="' . $ciclos[$i]["cod"] . '">' . $ciclos[$i]["cod"] . '</option>';
        };

        $formulario .= '</select>     
                          </p>';

        $formulario .= '   <p class="botones">
                    <input type="submit" id="irpaso2" class="boton" name="irpaso2" value="Iralpaso2">
                </p>
            </form>';

        echo $formulario;
    }

    /* Metodo mostrarModulosCandidatos
     * Muestra los modulos que tiene un ciclo concreto
     * @arguments {Array} Array de los modulos del ciclo
     */

    public static function mostrarModulosCandidatos($arrayModulos)
    {
        $modulosCandidatos = "<ul>";
        for ($i = 0; $i < count($arrayModulos); $i++) {
            $modulosCandidatos .= "<li>" . $arrayModulos[$i]["curso"] . "º " . $arrayModulos[$i]["nombre"] .
                    "<input type='submit' id='" . $arrayModulos[$i]["cod"] . "' name='insertar' value='" . $arrayModulos[$i]["cod"] . "'>
                                 </li>";
        }

        $modulosCandidatos .= "</ul>";
        echo $modulosCandidatos;
    }

    
    /* Metodo mostrarModulosEleguidos
     * Muestra los modulos eleguidos por el alumno
     * @arguments {Array} Array de modulos que sera el array que tenga el objeto Seleccion
     */

    public static function mostrarModulosEleguidos($arrayModulos)
    {
        $modulosEleguidos = "<ul>";
        foreach ($arrayModulos as $value) {
            $modulosEleguidos .= "<li>" . $value->getNombre() . "  " . $value->getHoras() .
                    "<input type='submit' id='" . $value->getCod() . "' name='quitar' value='" . $value->getCod() . "'>;
           </li>";
        }
        $modulosEleguidos .= "</ul>";
        echo $modulosEleguidos;
    }

    
    /* Metodo mostrarModulosEleguidosFinal
     * Muestra los modulos eleguidos por el alumno
     * @arguments {Array} Array de modulos que sera el array que tenga el objeto Seleccion
     */

    public static function mostrarModulosEleguidosFinal($arrayModulos)
    {
        $modulosEleguidos = "<ul>";
        foreach ($arrayModulos as $value) {
            $modulosEleguidos .= "<li><b>Nombre Modulo:</b> " . $value->getNombre() . " <b>Plazas disponibles:</b> " . $value->getPlazas() . "
                      </li>";
        }
        $modulosEleguidos .= "</ul>";
        echo $modulosEleguidos;
    }

    
    /* Metodo mostrarDatosPersonales
     * Muestra los datos del alumno
     * @arguments {Objeto} Objeto Alumno del cual sacare sus datos
     */

    public static function mostrarDatosPersonales($objetoAlumno)
    {
        $mostraDatos = "<p><b>Nombre:</b> " . $objetoAlumno->getNombreAlumno() . "</p>";
        $mostraDatos .= "<p><b>Apellido:</b> " . $objetoAlumno->getApellidoAlumno() . "</p>";
        $mostraDatos .= "<p><b>DNI:</b> " . $objetoAlumno->getDniAlumno() . "</p>";
        $mostraDatos .= "<p><b>Sexo:</b> " . $objetoAlumno->getSexoAlumno() . "</p>";
        $mostraDatos .= "<p><b>Fecha Nacimiento:</b> " . $objetoAlumno->getFechaNacimiento() . "</p>";
        $mostraDatos .= "<p><b>Ciclo eleguido:</b> " . $objetoAlumno->getCicloAlumno() . "</p>";
        echo $mostraDatos;
    }

    /* Metodo validarArchivo
     * -Valida que el formato del archivo sea correcto
     * -Devuelvo un texto para poner los errores en la misma pantalla del formulario(sino los pondria en una en blanco)
     */
    public static function validarArchivo($archivoValidar)
    {
        $tipoError = 0;

        $extensionArchivo = substr(strrchr($archivoValidar["name"], '.'), 1);
        

        if ($archivoValidar['size'] > 0) {

            if ($archivoValidar['size'] > 1000) { // tamaño aproximado de 5Mb 
                $tipoError=1;
                return $tipoError;
               
            } else if ($extensionArchivo != "rar" && $extensionArchivo != "zip") {
                
                $tipoError=2;
                return $tipoError;
                
                
            } else {
      
                return $tipoError;
                
               
            }
        }
    }

}
