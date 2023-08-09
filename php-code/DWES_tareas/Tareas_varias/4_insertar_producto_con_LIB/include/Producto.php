<?php

class Producto
{
    protected $codigo;
    protected $nombre;
    protected $nombre_corto;
    protected $PVP;
    protected $familia;
    
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
    public function getdescripcion()
    {
        return $this->descripcion;
    }
    public function getPVP()
    {
        return $this->PVP;
    }
    public function getFamilia()
    {
        return $this->familia;
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
        $this->descripcion = $row['descripcion'];
        $this->PVP = $row['PVP'];
        $this->familia = $row['familia'];
    }
}
?>
