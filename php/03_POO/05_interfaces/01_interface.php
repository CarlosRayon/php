<?php

/*
 * Se usan para simular la herencia multiple
-Un interface es como una clase vacía que solamente contiene declaraciones de métodos.NO puede tener atributos
-Se definen utilizando la palabra interface.
-Todos los métodos que se declaren en un interface deben ser públicos.
-Además de métodos, los interfaces podrán contener constantes pero no atributos.
 */

interface Interfaz //extends OtraInterface RECUERDA!!!pueden crear nuevos interfaces heredando de otros ya existentes.
{
    //    $atributo; La interface no puede tener atributos. SOLO metodos
    public function muestra($valor); //Los metodos pueden tener parametros pero no tiene cuerpo
}
