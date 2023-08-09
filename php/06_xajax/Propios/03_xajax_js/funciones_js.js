/* 
 Funciones JS que usaraemos.
 Sera las mismas que las definidas en el php de funciones xajax
 Hacemos una asociacion para que al llamar a la funcion js se ejecute la funcion php
 */

window.addEventListener("load", inicializadora);

function inicializadora()
{
    document.getElementById("boton").addEventListener("click", holaMundo);

    /*Llamo a las funciones registradas en ajax pasandole los datos capturados del formulario para que los validen
            -El modo synchronous la consola depuracion me dice que esta absoleto. Sera por la version me imagino
            -Aun poniendo return en la funcion xajax esta siempre me devuelve false no se por que if (respuesta==false) alert("Siempre da falso");
     */
    var respuestaCodigo = xajax.request({xjxfun: "funcionDos"}, {mode: 'asynchronous', parameters: [6]});

}

function holaMundo()
{
    //Puedo capturar un algo del DOM y pasarselo por parametro a la funcion que sera la definida en php
    xajax_holaMundo(document.getElementById("respuesta").innerHTML); //Ejecutamos la funcion RECURDAD!! Poner xajax_  antes del nombre de la funcion   
}

/*
 function holaMundo(parametro) {//Puedo asignar un parametro a la funcion y pasarsele a la funcin php
 xajax_holaMundo(parametro); //Ejecutamos la funcion RECURDAD!! Poner xajax_  antes del nombre de la funcion(mismo nombre que el definido en php)   
 }
 */

