<?php
class Proveedor{

    private $IDProveedor;
    private $NombreProveedor;
    private $Gmail;
    private $TelefonoProveedor;
    private $Estado;

    

    public function getIDProveedor()
    {
        return $this->IDProveedor;
    }

    public function setIDProveedor($IDProveedor)
    {
        $this->IDProveedor = $IDProveedor;

    }


    public function getNombreProveedor()
    {
        return $this->NombreProveedor;
    }

    public function setNombreProveedor($NombreProveedor)
    {
        $this->NombreProveedor = $NombreProveedor;

    }


    public function getGmail()
    {
        return $this->Gmail;
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