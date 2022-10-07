<?php
include_once 'conexion.php';


if(isset($_POST['MostrarProveedor'])){
    $newConn = new Conexion(); 
           $IDProveedor = $_POST['IDProveedor'];
           $sql = "SELECT * from proveedores, telefonoProveedores where proveedores.IDProveedor = ".$IDProveedor." AND telefonoProveedores.IDProveedor;" ;
           $newConn -> Conectar();
           $resultado = mysqli_query($newConn -> conn, $sql);
           $fila = mysqli_fetch_assoc($resultado);
        if($resultado -> num_rows > 0)
            echo '{"ID": "'.$IDProveedor.'", "ProveedorN": "'.$fila['Nombre'].'","ProveedorG": "'.$fila['Gmail'].'","ProveedorT": "'.$fila['Numero'].'"}';


       }else{
        echo"<script>alert('No hay ningun articulo con ese codigo de barras')";
       }


      ?> 