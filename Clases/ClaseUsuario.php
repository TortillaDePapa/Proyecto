<?php
include_once 'ClasePersona.php';

class Usuario extends Persona{

    private $IDUsuario;


    public function getIDUsuario()
    {
        return $this->IDUsuario;
    }

    public function setIDUsuario($IDUsuario)
    {
        $this->IDUsuario = $IDUsuario;

    }
}

?>