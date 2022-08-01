<?php
class conexion
{
    private $nombreServidor = "localhost";
    private $nombreUsuario = "root";
    private $contraseña = "";
    private $bd = "proyecto";
    private $con;

    public function Conectar()
    {
        $this->con = new mysqli($this->nombreServidor, $this->nombreUsuario, $this->contraseña, $this->bd);
        if ($this->con->connect_error) {
            die("Error al conectarse " . $this->con->connect_error);
        } else {
        
            return $this->con;
        }
    }
    public function Desconectar()
    {
        $this->con->close();
    }
}
?>