<?php
class Conexion
{
    private $nombreServidor = "localhost";
    private $nombreUsuario = "root";
    private $contraseña = "";
    private $bd = "epiz_32963687_proyecto";
    public $conn;

    public function Conectar(){
        $this->conn = new mysqli($this->nombreServidor, $this->nombreUsuario, $this->contraseña, $this->bd);
        if ($this->conn->connect_error) {
            die("<script>alert('Error al conectarse a la base de datos')</script>" . $this->conn->connect_error);
        return null;
        } else {
        
            return $this->conn;
        }
    }
    public function Desconectar()
    {
        $this->conn->close();
    }
}
?>