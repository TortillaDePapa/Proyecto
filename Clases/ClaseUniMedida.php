<?php

class UniMedida{

    private $UniMedida;
    private $Marca;
    private $TipoEnvase;

    /**
     * Get the value of UniMedida
     */ 
    public function getUniMedida()
    {
        return $this->UniMedida;
    }

    /**
     * Set the value of UniMedida
     *
     * @return  self
     */ 
    public function setUniMedida($UniMedida)
    {
        $this->UniMedida = $UniMedida;

        return $this;
    }
}

?>