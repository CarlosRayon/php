function inicializaCesta()
{
    xajax_inicializaCesta();
}

function vaciaCesta()
{
    // Se cambia el botón de Vaciar y se deshabilita
    //  hasta que llegue la respuesta
    xajax.$('bvaciar').disabled=true;
    xajax.$('bvaciar').value="Un momento...";
    
    // Aquí se hace la llamada a la función registrada de PHP
    xajax_vaciaCesta();
}

function nuevoProducto(cod)
{
    // Aquí se hace la llamada a la función registrada de PHP
    xajax_nuevoProducto(cod);
}
