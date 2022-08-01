<?php
include_once 'conexion.php';

class PersonasBD extends conexion{

    public function CargarPersonas($nombreUser, $contraseña, $apellido, $nombre, $email){
        $conexion = $this->conectar();


        $sql = "INSERT INTO persona (Usuario, Contraseña, Apellido, Nombre, Email) VALUES($nombreUser, $contraseña, $apellido, $nombre, $email)";
       
       
       if($conexion -> query($sql)){
        echo "Error al insertar al nuevo usuario:\n$sql";
        exit;
        
        }
        else {
        echo "Usuario: $_POST[Usuario], Registrado Exitosamente";
        
         }
    }
}
?>