<?php

/*
 * Clase Abstracta:
 * -DEFINE como van a ser los metodos de la clase
 * -Solo pueden ser definidas pero no instaciadas
 * -Solo se accede a ellas mediante las subclases
 * -Si un solo metodo es definido como abstracto esa clase ya sera abstracta
 * -Para ser heredadas OBLIGATORIAMENTE tengo que sobreescribir los metodos abstractos  que hereda
 */

abstract class ClaseAbstracta
{
    //public $atributo;La clase abstractas pueden tener atributos
    //Defino funciones abstracta. CUIDADO!! No pueden tener cuerpo {} estos metodos, solo `ser definidas
    public abstract function metodo1($valor1);

    public abstract function metodo2();
}


//Creo una clase que herede de la clase abstracta
class Normal extends ClaseAbstracta
{
    /*CUIDADO!!!
        - Si heredo de una clase abstracta tengo que redefinir los metodos de la clase abstracta OBLIGATORIAMENTE
        - Si el metodo tiene parametro en la clase abstract en la clase que hereda tambien lo tiene que tener.
     */

    public function metodo1($valor1)
    {
        echo $valor1;
    }
    public function metodo2()
    {
        echo "metodo 2";
    }
}
//Usamos la clase y los metodos de esta de forma normal de forma normalmente
$var = new Normal();
$var->metodo1("hola");
