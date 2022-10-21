<?php
include_once 'Clases/ClaseProveedor.php';
include_once 'Conexion.php';
class ProveedorBD extends Conexion{
    
    public function AgregarProveedor($Proveedor){
        $sql2 = "SELECT * FROM proveedores Where Nombre = '".$Proveedor -> getNombreProveedor()."'";
        $this -> Conectar();
        $resultado2 = mysqli_query($this -> conn, $sql2);
        if(!$resultado2 -> num_rows > 0){
            $sql = "INSERT INTO Proveedores(Nombre,Gmail,Estado) VALUES('".$Proveedor -> getNombreProveedor()."','".$Proveedor -> getGmail()."','1')";
            $resultado = mysqli_query($this -> conn, $sql);
            if($resultado){
                $sql1 = "SELECT idProveedor FROM proveedores Where Nombre = '".$Proveedor -> getNombreProveedor()."'";
                $resultado1 = mysqli_query($this -> conn, $sql1);
                $fila = mysqli_fetch_assoc($resultado1);
                if($resultado1){
                    $sql4 = "INSERT INTO TelefonoProveedores(idproveedor, Numero) VALUES('".$fila['idProveedor']."','".$Proveedor -> getTelefonoProveedor()."')";
                    $resultado3 = mysqli_query($this -> conn, $sql4);
                    if($resultado3){
                    echo "<script> alert('Proveedor Agregado Correctamente')</script>";
                }
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

    

    public function ModificarProveedor($Proveedor){
        $sql = "SELECT idproveedor FROM proveedores WHERE idProveedor = '".$Proveedor -> getIDProveedor()."'";
        $this -> Conectar();
        $resultado = mysqli_query($this -> conn, $sql);
        if($resultado -> num_rows > 0){
            $sql1 = "SELECT * FROM proveedores WHERE idProveedor = '".$Proveedor -> getIDProveedor()."'";
            $this -> Conectar();
            $resultado1 = mysqli_query($this -> conn, $sql1);
            if($resultado1){
                $sql3 = "UPDATE proveedores, telefonoProveedores SET proveedores.Nombre = '".$Proveedor -> getNombreProveedor()."', proveedores.Gmail='".$Proveedor -> getGmail()."',telefonoProveedores.numero='".$Proveedor -> getTelefonoProveedor()."' WHERE proveedores.IDProveedor = TelefonoProveedores.IDProveedor AND proveedores.idProveedor = '".$Proveedor -> getIDProveedor()."'";
                $resultado2 = mysqli_query($this -> conn, $sql3);
                if($resultado2){
                    echo "<script> alert('Proveedor modificado Correctamente')</script>";
                }
            }
            }elseif(!$resultado -> num_rows > 0){
                $sql2 = "UPDATE proveedores, telefonoProveedores SET proveedores.Nombre = '".$Proveedor -> getNombreProveedor()."', proveedores.Gmail='".$Proveedor -> getGmail()."',telefonoProveedores.numero='".$Proveedor -> getTelefonoProveedor()."' WHERE proveedores.IDProveedor = TelefonoProvedores.IDProveedor AND proveedores.idProveedor = '".$Proveedor -> getIDProveedor()."'";
                $resultado2 = mysqli_query($this -> conn, $sql2);
                if($resultado2){
                    echo "<script> alert('Proveedor modificado Correctamente')</script>";
                }
            
        }else{
            echo "<script> alert('Este proveedor no existe')</script>";
        }
    }

    public function EliminarProveedores($Proveedor){
        $sql = "UPDATE Proveedores SET Estado = '0' where IDProveedor = '".$Proveedor -> getIDProveedor()."'";
        $this -> Conectar();
        $resultado = mysqli_query($this -> conn, $sql);
        if($resultado){
           echo"<script>alert('Proveedor eliminado con exito')";
        }else{
           echo"<script>alert('Error al eliminar al proveedor')";
        }
   }

   public function MostrarProveedor(){

    $sql = "SELECT * FROM proveedores, telefonoproveedores where proveedores.idproveedor=telefonoproveedores.idproveedor";
    $this -> Conectar();
    $result = mysqli_query($this -> conn, $sql);

     if($result -> num_rows > 0){

         $ListarProveedor[] = new Proveedor();
 
         while($row = $result -> fetch_assoc()){
             $p = new Proveedor(); 
             $p -> setIDProveedor($row['IDProveedor']);
             $p -> setNombreProveedor($row['Nombre']);
             $p -> setGmail($row['Gmail']);
             $p -> setTelefonoProveedor($row['Numero']);
             $p -> setEstado($row['Estado']);
             $ListarProveedor [] = $p;
         }
         return $ListarProveedor;
     }else{
         return null;
     }
 
 }
   }

    



?>