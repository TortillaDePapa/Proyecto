<?php
include_once 'ClasePersona.php';

class Cliente extends Persona{

    private $IDCiente;
    private $NumeroCasa;
    private $NombreCalle;

  
    public function getIDCiente()
    {
        return $this->IDCiente;
    }

    public function setIDCiente($IDCiente)
    {
        $this->IDCiente = $IDCiente;

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