<?php
include_once 'conexion.php';


if(isset($_POST['MostrarFactura'])){
   
    $IDenvio = $_POST['MostrarFactura']; 
    $newConn = new Conexion();
    $newConn -> Conectar();
    $sql = "SELECT envios.IDEnvio, compras.IDCompra, compras.IDProducto,compras.Fecha , compras.CantidadProducto, compras.Total, productos.Precio FROM envios, compras, productos WHERE envios.IDEnvio = compras.IDCompra AND compras.IDProducto = productos.IDProducto AND envios.IDEnvio = '".$_POST['MostrarFactura']."' ORDER BY envios.IDEnvio DESC, compras.IDProducto DESC";
    $resultado = mysqli_query($newConn ->conn, $sql);
    if($fila = mysqli_fetch_all( $resultado,MYSQLI_ASSOC)){
       
        foreach ($fila as $item => $value){
            // echo var_dump($value['IDEnvio']);
         echo '{"IDEnvio": "'.$IDenvio.'", "IDProducto": "'.$value['IDProducto'].'", "PrecioU": "'.$value['Precio'].'", "Cantidad": "'.$value['CantidadProducto'].'", "Total": "'.$value['Total'].'", "Fecha": "'.$value['Fecha'].'" }';
            
       }
        
    }


}


?>