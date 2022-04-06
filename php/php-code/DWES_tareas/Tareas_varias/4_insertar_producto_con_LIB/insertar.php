<?php
    
    require_once 'include/Producto.php';
    require_once 'include/DB.php';
    require_once 'smarty/libs/Smarty.class.php';
    $smarty = new Smarty();
    
    // Configuración de Smarty
    $smarty->template_dir = "smarty/templates/";
    $smarty->compile_dir = "smarty/templates_c/";
    $smarty->config_dir = "smarty/configs/";
    $smarty->cache_dir = "smarty/cache/";
    
    // Para añadir un producto a la cesta
if (isset($_POST['insertar'])) {        
        
    $prod['cod']            = $_POST['codigo'];
    $prod['nombre']            = $_POST['nombre'];
    $prod['nombre_corto']    = $_POST['nombre_corto'];
    $prod['descripcion']    = $_POST['descripcion'];
    $prod['PVP']            = $_POST['precio'];
    $prod['familia']        = $_POST['familia'];
    
        
        
    $producto = new Producto($prod);        
        
    $resultado = DB::insertar_producto($producto);
        
    $smarty->assign("resultado", $resultado);
        
}
    
    $smarty->display("insertar.tpl");
?>