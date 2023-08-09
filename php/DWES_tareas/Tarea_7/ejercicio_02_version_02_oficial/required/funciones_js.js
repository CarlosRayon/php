/* 
 Funciones JS que usaraemos.
 Sera las mismas que las definidas en el php de funciones xajax
 Hacemos una asociacion para que al llamar a la funcion js se ejecute la funcion php
 */


window.addEventListener("load", inicializadora);

function inicializadora()
{   
    var boton=document.getElementById("insertar"); 
    boton.addEventListener("click",procesFormulario); 
}


/*Al pulsar en boton enviar llamamos a esta funcion*/
function procesFormulario()
{
    /*Capturo los elemento del formulario que quiero validar*/
    var codigo=document.getElementById("codigo").value;   
    var horas=document.getElementById("horas").value;    
    var ciclo=document.getElementById("ciclo").value;
    var nombre=document.getElementById("nombre").value;
    var curso=document.getElementById("curso").value;
    var plazas=document.getElementById("plazas").value;
      
    /*Llamo a las funciones registradas en ajax pasandole los datos capturados del formulario para que los validen
     *  -El modo synchronous la consola depuracion me dice que esta absoleto. Sera por la version me imagino
     *  -Aun poniendo return en la funcion xajax esta siempre me devuelve false no se por que if (respuesta==false) alert("Siempre da falso");
     */
    var respuestaCodigo = xajax.request({xjxfun:"existeCodigo"}, {mode:'asynchronous', parameters:[codigo]});   
    var respuestaHoras = xajax.request({xjxfun:"verificarHoras"}, {mode:'asynchronous', parameters:[horas]});   
    var respuestaCiclo = xajax.request({xjxfun:"verificarCiclo"}, {mode:'asynchronous', parameters:[ciclo]});   
    var respuestaNombre = xajax.request({xjxfun:"verificarNombre"}, {mode:'asynchronous', parameters:[nombre]});   
    var respuestaCurso = xajax.request({xjxfun:"verificarCurso"}, {mode:'asynchronous', parameters:[curso]});   
    var respuestaPlazas = xajax.request({xjxfun:"verificarPlazas"}, {mode:'asynchronous', parameters:[plazas]});  
    
        /*Le paso los campos obtenido para la insercion 
         * DEBERIA HACER COMO UN EJEMPLO DEL TEMEARIO QUE CUANDO
         *  TODOS LOS XAJAX.REQUEST DEVUELVAN TRUE LLAME A ESTA FUNCION...PERO NO CONSIGO QUE DEVUELVAN TRUE :(
         */
        
    var respuestaPlazas = xajax.request({xjxfun:"insertar"}, {mode:'asynchronous', parameters:[codigo,nombre,horas,curso,plazas,ciclo]});  
    
   
   
    
}

