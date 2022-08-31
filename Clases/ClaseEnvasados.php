<?php

class Envasado{

    private $Envasado;
    private $Marca;
    private $TipoEnvase;

    public function getEnvasado()
    {
        return $this->Envasado;
    }

    public function setEnvasado($Envasado)
    {
        $this->Envasado = $Envasado;

    }

    public function getMarca()
    {
        return $this->Marca;
    }

    public function setMarca($Marca)
    {
        $this->Marca = $Marca;

    }

    public function getTipoEnvase()
    {
        return $this->TipoEnvase;
    }

    public function setTipoEnvase($TipoEnvase)
    {
        $this->TipoEnvase = $TipoEnvase;

    }
}

?>