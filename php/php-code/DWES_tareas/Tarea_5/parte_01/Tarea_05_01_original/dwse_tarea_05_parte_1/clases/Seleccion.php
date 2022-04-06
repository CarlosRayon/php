<?php

/*
  Clase que definira un objeto donde guardar los modulos de cada alumno
 */

class Seleccion
{

    //Atributos
    private $modulosEleguidos = Array(); //Array donde guardaremos los objetos/modulos eleguidos

    //Metodos
    /* Metodos getter y setter */

    function getModulosEleguidos()
    {
        return $this->modulosEleguidos;
    }

    function setModulosEleguidos($modulosEleguidos)
    {
        $this->modulosEleguidos = $modulosEleguidos;
    }

    
    /* Metodo que añadira un modulo/objeto al array
     * @argument {Array} array con los modulos de un ciclo
     * @argument {String} codigo del modulo que queremos añadir
     */
    public function añadirModulo2($listamodulos, $codigoModulo)
    {
        $control = false;
       
        /*Creo el modulo....*/
        for ($i = 0; count($listamodulos); $i++) {           
            if ($listamodulos[$i]["cod"] == $codigoModulo) {//....Si el codigo que le paso es igual al codigo de un modulo de la lista, tomos sus valores....
                $cod = $listamodulos[$i]["cod"];
                $nombre = $listamodulos[$i]["nombre"];
                $horas = $listamodulos[$i]["horas"];
                $curso = $listamodulos[$i]["curso"];
                $plazas = $listamodulos[$i]["plazas"];
                $ciclo = $listamodulos[$i]["ciclo"];
                break;
            }
        }

        $moduloAñadir = new Modulo($cod, $nombre, $horas, $curso, $plazas, $ciclo);//...y creo un objeto/modulo con estos valores

        /*Añado el modulo al objeto seleccion*/
        if (empty($this->modulosEleguidos)) {//Si el array esta vacio (de inicio) inserto un objeto/modulo en el array 
            array_push($this->modulosEleguidos, $moduloAñadir);
            $control = true;//Para evitar repeticion de modulos al añadir
        } else {//Si el array de objetos modulos tiene algun elemento compruebo, por su codigo que no este ya incluido
            for ($i = 0; $i < count($this->modulosEleguidos); $i++) {
                if ($this->modulosEleguidos[$i]->getCod() == $moduloAñadir->getCod()) {//si el codigo del modulo para añadir ya le tengo en la lista de modulos
                    $control = true;//Para evitar repeticion de modulos al añadir
                    echo  "<p id='error'>Este modulo ya ha sido seleccionado. Eliga otro</p>";
                }
            }
        }

        if (!$control) {
            
            array_push($this->modulosEleguidos, $moduloAñadir);
        }
        
    }

    /*Metodo añadirTodosModulos
     * Añade todos los modulos al objeto seleccion
     * @arguments {Array} La lista con todos los modulos de un ciclo concreto
     */
    public function añadirTodosModulos($listamodulos)
    {
        
         $this->modulosEleguidos = Array();//Lo primero dejo el array vacio para evitar errores pues si ya teniamos algun modulo metido
         
        for ($i = 0; $i<count($listamodulos); $i++) {              
            $cod = $listamodulos[$i]["cod"];  //Guardo los valores de los modulos
            $nombre = $listamodulos[$i]["nombre"];
            $horas = $listamodulos[$i]["horas"];
            $curso = $listamodulos[$i]["curso"];
            $plazas = $listamodulos[$i]["plazas"];
            $ciclo = $listamodulos[$i]["ciclo"];
                
            $moduloAñadir = new Modulo($cod, $nombre, $horas, $curso, $plazas, $ciclo);//Creo un objeto/modulo con los valores
                 
            array_push($this->modulosEleguidos, $moduloAñadir);//Le añado al la lista
            //Asi hasta que pasen todos los modulos
        }  
         
    }
    
    /*
     * Metodo eliminarModulo
     * -borra un modulo
     * @arguments {String} codigo del modulo que queremos borrar
     */

    public function eliminarModulos($codigoModuloBorrar)
    {
        for ($i = 0; count($this->modulosEleguidos); $i++) {//Recorro los modulo
            if ($this->modulosEleguidos[$i]->getCod() == $codigoModuloBorrar) {//Si encuentro coincidencia....
                unset($this->modulosEleguidos[$i]);//....Borro este modulo
                $this->modulosEleguidos = array_values($this->modulosEleguidos); //Ordeno el array para evitar problemas(unset no borra posicion)
                break;
            }
        }
    }

    /*
     * Metodo vaciarModulos
     * -Elimina todos los modulos que tenga el array(Le vuelvo a definir como un array vacio)
     */
    public function vaciarModulo()
    {
        $this->modulosEleguidos = Array();
    }

    /*Metodo verHorasTotales
     * @return {Integer} Total de horas de los modulos seleccionados
     */
    public function verHorasTotales()
    {
        $sumaHoras=0;
        foreach ($this->modulosEleguidos as $value) {
            $sumaHoras+= $value->getHoras();          
        }     
        return $sumaHoras;
    }
}




