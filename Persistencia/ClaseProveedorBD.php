<?php
include_once 'Clases/ClaseProveedor.php';
include_once 'Conexion.php';
class ProveedorBD extends Conexion{
    
    public function AgregarProveedor($Proveedor){
        $sql2 = "SELECT * FROM proveedores Where Nombre = '".$Proveedor -> getNombreProveedor()."'";
        $this -> Conectar();
        $resultado2 = mysqli_query($this -> conn, $sql2);
        if(!$resultado2 -> num_rows > 0){
            $sql = "INSERT INTO Proveedores(Nombre,Gmail) VALUES('".$Proveedor -> getNombreProveedor()."','".$Proveedor -> getGmail()."')";
            $resultado = mysqli_query($this -> conn, $sql);
            if($resultado){
                $sql1 = "SELECT idProveedor FROM proveedores Where Nombre = '".$Proveedor -> getNombreProveedor()."'";
                $resultado1 = mysqli_query($this -> conn, $sql1);
                $fila = mysqli_fetch_asssoc($resultado1);
                if($resultado1){
                    $sql4 = "INSERT INTO TelefonoProveedor(idproveedor, TelefonoProveedor) VALUES('".$fila['idproveedor']."','".$Proveedor -> getTelefonoProveedor()."')";
                    echo "<script> alert('Proveedor Agregado Correctamente')</script>";
                }else{
                    echo "<script> alert('Hubo un Error al agregar el telefono del proveedor')</script>";
                }
            }else{
                echo "<script> alert('Hubo un error al agregar al proveedor')</script>";
            }
        }else{
            echo "<script> alert('Este Proveedor ya existe')</script>";
        }
    }
    
}



?>