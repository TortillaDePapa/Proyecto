<?php
include_once 'ClasePersona.php';

class Cliente extends Persona{

    private $IDCiente;
    private $NumeroCasa;
    private $NombreCalle;
    private $Estado;

  
    public function getIDCiente()
    {
        return $this->IDCiente;
    }

    public function setIDCiente($IDCiente)
    {
        $this->IDCiente = $IDCiente;

    }

    public function getEstado()
    {
        return $this->Estado;
    }

    public function setEstado($Estado)
    {
        $this->Estado = $Estado;

    }


    public function getNumeroCasa()
    {
        return $this->NumeroCasa;
    }

  
    public function setNumeroCasa($NumeroCasa)
    {
        $this->NumeroCasa = $NumeroCasa;

        
    }
 
    public function getNombreCalle()
    {
        return $this->NombreCalle;
    }

    public function setNombreCalle($NombreCalle)
    {
        $this->NombreCalle = $NombreCalle;

    
    }
}

?>