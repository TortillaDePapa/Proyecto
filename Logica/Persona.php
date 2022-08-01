<?php
include '../Persistencia/personasBD.php';
class Persona{
    private $nombreUser;
    private $contraseña;
    private $apellido;
    private $nombre;
    private $email;

function getNombreUser(){
    return $this -> nombreUser;
}

function setNombreUser($nombreUser){
    $this -> nombreUser = $nombreUser;
}

function getContrseña(){
    return $this -> contraseña;
}

function setContraseña($contraseña){
    $this -> contraseña = $contraseña;
}

function getApellido(){
    return $this -> apellido;
}

function setApellido($apellido){
    $this -> apellido = $apellido;
}

function getNombre(){
    return $this -> nombre;
}

function setNombre($nombre){
    $this -> nombre = $nombre;
}

function getEmail(){
    return $this -> email;
}

function setEmail($email){
    $this -> email = $email;
}
public function CargarPersona(){
    $p = new PersonasBD();
    $p -> CargarPersonas($this->getNombreUser(), $this->getContrseña(), $this->getApellido(), $this->getNombre(), $this->getEmail());
}

}
