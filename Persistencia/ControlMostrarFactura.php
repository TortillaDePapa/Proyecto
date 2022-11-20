<?php
include_once 'conexion.php';


if(isset($_POST['MostrarFactura'])){
   
    $IDenvio = $_POST['MostrarFactura']; 
    $newConn = new Conexion();
    $newConn -> Conectar();
    $sql = "SELECT envios.IDEnvio, compras.IDCompra, compras.IDProducto,compras.Fecha , compras.CantidadProducto, compras.Total, productos.Precio, productos.Nombre as NombreP, personas.Nombre FROM envios, compras, productos, personas WHERE envios.IDCompra = compras.IDCompra AND compras.IDProducto = productos.IDProducto AND compras.IDCliente = personas.IDPersona AND envios.IDEnvio = ".$_POST['MostrarFactura']." ORDER BY envios.IDEnvio DESC, compras.IDProducto DESC";
    $resultado = mysqli_query($newConn ->conn, $sql);
    if($fila = mysqli_fetch_all( $resultado,MYSQLI_ASSOC)){
        
        $factura = array();
        foreach ($fila as $item => $value){
       
        array_push( $factura , array(
            'IDEnvio' => $IDenvio,
            'IDProducto' => $value['IDProducto'],
            'PrecioU' => $value['Precio'],
            'Cantidad' => $value['CantidadProducto'],
            'Total' => $value['Total'],
            'Fecha'  => $value['Fecha'],
            'Nombre' => $value['NombreP'],
            'FechaV' => $fechaV,
            'Cliente' => $value['Nombre']
            )
        );
       }
       echo json_encode($factura);
    
    }


}


?>