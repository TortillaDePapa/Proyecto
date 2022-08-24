<?php

class Persona
{
    private $IDPersona;
    private $Usuario;
    private $Contraseña;
    private $CContraseña;
    private $Nombre;
    private $Apellido;
    private $Telefono;
    
    
    public function getIDPersona()
    {
        return $this->IDPersona;
    }

    public function setIDPersona($IDPersona)
    {
        $this->IDPersona = $IDPersona;

    }

    public function getUsuario()
    {
        return $this->Usuario;
    }

    public function setUsuario($Usuario)
    {
        $this->Usuario = $Usuario;

    }

    public function getContraseña()
    {
        return $this->Contraseña;
    }

    public function setContraseña($Contraseña)
    {
        $this->Contraseña = $Contraseña;

    }

    public function getNombre()
    {
        return $this->Nombre;
    }
 
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;

    }

    public function getApellido()
    {
        return $this->Apellido;
    }

    public function setApellido($Apellido)
    {
        $this->Apellido = $Apellido;

    }

    public function getTelefono()
    {
        return $this->Telefono;
    }

    public function setTelefono($Telefono)
    {
        $this->Telefono[] = $Telefono;

    }

    public function getCContraseña()
    {
        return $this->CContraseña;
    }

    public function setCContraseña($CContraseña)
    {
        $this->CContraseña = $CContraseña;

    }
}

?>