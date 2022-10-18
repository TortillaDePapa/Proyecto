<?php
include_once 'conexion.php';


if(isset($_POST['MostrarProducto'])){
    $newConn = new Conexion(); 
           $IDProducto = $_POST['IDProducto'];
           $sql = "SELECT * from productos where IDProducto = ".$IDProducto."";
           $newConn -> Conectar();
           $resultado = mysqli_query($newConn -> conn, $sql);
           $fila = mysqli_fetch_assoc($resultado);
        if($resultado -> num_rows > 0)
            echo '{"ID": "'.$IDProducto.'", "CodBarra": "'.$fila['CodigoBarra'].'","Descripcion": "'.$fila['Descripcion'].'","Stock": "'.$fila['Stock'].'", "NombreProducto":"'.$fila['Nombre'].'", "Precio": "'.$fila['Precio'].'"}';


       }else{
        echo"<script>alert('No hay ningun articulo con ese codigo de barras')";
       }




       if(isset($_POST['EliminarA'])){
        $newConn = new Conexion(); 
        $IDProducto = $_POST['EliminarA'];
        $sql = "UPDATE Productos SET Estado = '0' where IDProducto = ".$IDProducto."";
        $newConn -> Conectar();
        $resultado = mysqli_query($newConn -> conn, $sql);
        if($resultado){
           echo"<script>alert('Articulo eliminado con exito')";
        }else{
           echo"<script>alert('Error al eliminar el articulo')";
        }
   
}
if(isset($_POST['AgregarA'])){
   $newConn = new Conexion(); 
   $IDProducto = $_POST['AgregarA'];
   $sql = "UPDATE Productos SET Estado = '1' where IDProducto = ".$IDProducto."";
   $newConn -> Conectar();
   $resultado = mysqli_query($newConn -> conn, $sql);
   if($resultado){
      echo"<script>alert('Articulo eliminado con exito')";
   }else{
      echo"<script>alert('Error al eliminar el articulo')";
   }

}
      ?> 