<?php

class Producto
{
    protected $codigo;
    protected $nombre;
    protected $nombre_corto;
    protected $PVP;
    
    public function getcodigo()
    {
        return $this->codigo; 
    }
    public function getnombre()
    {
        return $this->nombre; 
    }
    public function getnombrecorto()
    {
        return $this->nombre_corto; 
    }
    public function getPVP()
    {
        return $this->PVP; 
    }
    
    //Función para devolver datos en pagar.php
    public function getCompleto()
    {
        echo "<p>".$this->codigo."--".$this->nombre_corto."--".$this->PVP." $"."</p>";    
    }       
    
    public function __construct($row)
    {
        $this->codigo = $row['cod'];
        $this->nombre = $row['nombre'];
        $this->nombre_corto = $row['nombre_corto'];
        $this->PVP = $row['PVP'];
    }
}
?>
