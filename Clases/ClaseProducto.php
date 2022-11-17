<?php

class Producto{

     
    private $IDProducto;
    private $CodBarra;
    private $imagen;
    private $Descripcion;
    private $Stock;
    private $Nombre;
    private $Precio;
    private $FechaVencimiento;
    private $Estado;
    private $IDEnvio;
    private $Direccion;
    private $fecha;
    private $EstadoEnvio;
    private $MetodoPago;


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


    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;

    }


    public function getIDEnvio()
    {
        return $this->IDEnvio;
    }

   
    public function setIDEnvio($IDEnvio)
    {
        $this->IDEnvio = $IDEnvio;

    }

    
    public function getDireccion()
    {
        return $this->Direccion;
    }

    
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;

        
    }

     
    public function getFecha()
    {
        return $this->fecha;
    }

    
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

    }

    
    public function getEstadoEnvio()
    {
        return $this->EstadoEnvio;
    }

    public function setEstadoEnvio($EstadoEnvio)
    {
        $this->EstadoEnvio = $EstadoEnvio;

       
    }

     
    public function getMetodoPago()
    {
        return $this->MetodoPago;
    }

    
    public function setMetodoPago($MetodoPago)
    {
        $this->MetodoPago = $MetodoPago;

    }
}



?>