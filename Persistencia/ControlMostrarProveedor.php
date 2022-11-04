<?php
include_once 'conexion.php';


if(isset($_POST['MostrarProveedor'])){
    $newConn = new Conexion(); 
           $IDProveedor = $_POST['IDProveedor'];
           $sql = "SELECT * from proveedores, telefonoProveedores where proveedores.IDProveedor = ".$IDProveedor." AND telefonoProveedores.IDProveedor = proveedores.IDProveedor " ;
           $newConn -> Conectar();
           $resultado = mysqli_query($newConn -> conn, $sql);
        if( $fila = mysqli_fetch_assoc($resultado)){
            echo '{"ID": "'.$IDProveedor.'", "ProveedorN": "'.$fila['Nombre'].'","ProveedorG": "'.$fila['Gmail'].'","ProveedorT": "'.$fila['Numero'].'"}';

        }
       }else{
        
       }


      ?> 