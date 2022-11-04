<?php
include_once 'conexion.php';


if(isset($_POST['MostrarProducto'])){
         $newConn = new Conexion(); 
         $newConn -> Conectar();
         $IDProducto = $_POST['IDProducto'];
         $sql = "SELECT * from productos where IDProducto = ".$IDProducto."";
           
         $resultado = mysqli_query($newConn -> conn, $sql);
        if($fila = mysqli_fetch_assoc($resultado)){
            echo '{"ID": "'.$IDProducto.'", "CodBarra": "'.$fila['CodigoBarra'].'", "Descripcion": "'.$fila['Descripcion'].'", "Stock": "'.$fila['Stock'].'", "NombreProducto": "'.$fila['Nombre'].'", "Precio": "'.$fila['Precio'].'"}';
       }else{
        
       }
      }



       if(isset($_POST['EliminarA'])){
        $newConn = new Conexion(); 
        $IDProducto = $_POST['EliminarA'];
        $sql = "UPDATE Productos SET Estado = '0' where IDProducto = ".$IDProducto."";
        $newConn -> Conectar();
        $resultado = mysqli_query($newConn -> conn, $sql);
        if($resultado){
           echo"<script>alert('Articulo eliminado con exito')</script>";
        }else{
           echo"<script>alert('Error al eliminar el articulo')</script>";
        }
   
}
if(isset($_POST['AgregarA'])){
   $newConn = new Conexion(); 
   $IDProducto = $_POST['AgregarA'];
   $sql = "UPDATE Productos SET Estado = '1' where IDProducto = ".$IDProducto."";
   $newConn -> Conectar();
   $resultado = mysqli_query($newConn -> conn, $sql);
   if($resultado){
      echo"<script>alert('Articulo eliminado con exito')</script>";
   }else{
      echo"<script>alert('Error al eliminar el articulo')</script>";
   }

}
      ?> 