<?php

class UniMedida{

    private $UniMedida;
    private $Marca;
    private $TipoEnvase;

    public function getUniMedida()
    {
        return $this->UniMedida;
    }

    public function setUniMedida($UniMedida)
    {
        $this->UniMedida = $UniMedida;

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