<?php

class Producto{

     
    private $IDProducto;
    private $CodBarra;
    private $imagen;
    private $SKU;
    private $Stock;
    private $Nombre;
    private $Precio;
    private $FechaVencimiento;
    private $Estado;
    
    public function getIDProducto()
    {
        return $this->IDProducto;
    }

    public function setIDProducto($IDProducto)
    {
        $this->IDProducto = $IDProducto;

    }

    public function getCodBarra()
    {
        return $this->CodBarra;
    }

    public function setCodBarra($CodBarra)
    {
        $this->CodBarra = $CodBarra;

    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

    }

    public function getSKU()
    {
        return $this->SKU;
    }

    public function setSKU($SKU)
    {
        $this->SKU = $SKU;

    }

    public function getStock()
    {
        return $this->Stock;
    }

    public function setStock($Stock)
    {
        $this->Stock = $Stock;

    }
 
    public function getNombre()
    {
        return $this->Nombre;
    }

    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;

    }

    public function getPrecio()
    {
        return $this->Precio;
    }

    public function setPrecio($Precio)
    {
        $this->Precio = $Precio;

    }

    public function getFechaVencimiento()
    {
        return $this->FechaVencimiento;
    }
 
    public function setFechaVencimiento($FechaVencimiento)
    {
        $this->FechaVencimiento = $FechaVencimiento;

    }

    public function getEstado()
    {
        return $this->Estado;
    }
 
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;

    }

}



?>