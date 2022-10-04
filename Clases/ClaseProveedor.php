<?php
class Proveedores{

    private $IDProveedor;
    private $Nombre;
    private $Gmail;
    private $TelefonoProveedor;

    

    public function getIDProveedor()
    {
        return $this->getIDProveedor;
    }

    public function setIDProveedor($IDProveedor)
    {
        $this->IDProveedor = $IDProveedor;

    }


    public function getNombre()
    {
        return $this->IDNombre;
    }

    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;

    }


    public function getGmail()
    {
        return $this->getGmail;
    }

    public function setGmail($Gmail)
    {
        $this->Gmail = $Gmail;

    }


    public function getTelefonoProveedor()
    {
        return $this->TelefonoProveedor;
    }

    public function setTelefonoProveedor($TelefonoProveedor)
    {
        $this->TelefonoProveedor = $TelefonoProveedor;

    }
}

?>