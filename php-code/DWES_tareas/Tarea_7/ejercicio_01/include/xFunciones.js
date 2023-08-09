/* 
Funciones JS que representan las funciones php
 */


window.addEventListener("load", inicializador);

function inicializador()
{
    var numeroMatricula=document.getElementById("numeromatricula").addEventListener("keyup",mostrarDatos);
    mostrarDatos;
    anular;
}

function mostrarDatos()
{
    var contador=document.getElementById("numeromatricula").value;
     
    xajax_mostrarDatos(contador);
    
   
}

function anular(modulo,contador)
{       
      xajax_anular(modulo,contador);
}