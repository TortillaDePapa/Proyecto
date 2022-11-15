<?php
include_once 'conexion.php';


if(isset($_POST['MostrarFactura'])){
   
    $IDenvio = $_POST['MostrarFactura']; 
    $newConn = new Conexion();
    $newConn -> Conectar();
    $sql = "SELECT DISTINCT * FROM envios, compras, selecciona, clientes, personas, productos where selecciona.IDProducto = productos.IDProducto AND compras.idcliente = selecciona.idcliente and selecciona.idcliente = clientes.idcliente AND envios.IDCompra = compras.IDCompra AND compras.IDProducto = selecciona.IDProducto AND clientes.IDCliente = personas.IDPersona AND envios.IDEnvio = '".$_POST['MostrarFactura']."'";
    $resultado = mysqli_query($newConn ->conn, $sql);
    if($fila = mysqli_fetch_all( $resultado,MYSQLI_ASSOC)){
       
        foreach ($fila as $item => $value){
            // echo var_dump($value['IDEnvio']);
         echo '{"IDEnvio": "'.$IDenvio.'", "IDProducto": "'.$value['IDProducto'].'", "PrecioU": "'.$value['Precio'].'", "Cantidad": "'.$value['CantidadProducto'].'", "Total": "'.$value['Total'].'", "Fecha": "'.$value['Fecha'].'" }';
            echo "<br />";
       }
        
    }


}


?>