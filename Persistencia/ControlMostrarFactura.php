<?php
include_once 'conexion.php';


if(isset($_POST['MostrarFactura'])){
   
    $IDenvio = $_POST['MostrarFactura']; 
    $newConn = new Conexion();
    $newConn -> Conectar();
    $sql = "SELECT DISTINCT * FROM envios, compras, selecciona, clientes, personas, productos where envios.idcliente = compras.idcliente and compras.idcliente = selecciona.idcliente and selecciona.idcliente = clientes.idcliente and clientes.idcliente = personas.idpersona AND envios.IDCompra = compras.IDCompra AND compras.IDProducto = selecciona.IDProducto and envios.IDProducto = compras.IDProducto AND envios.IDCliente = personas.IDPersona AND selecciona.IDProducto = productos.IDProducto AND envios.IDEnvio = '".$_POST['MostrarFactura']."'";
    $resultado = mysqli_query($newConn ->conn, $sql);
    if($fila = mysqli_fetch_assoc($resultado)){

        echo '{"IDEnvio": "'.$IDenvio.'", "IDProducto": "'.$fila['IDProducto'].'", "PrecioU": "'.$fila['Precio'].'", "Cantidad": "'.$fila['CantidadProducto'].'", "Total": "'.$fila['Total'].'", "Fecha": "'.$fila['Fecha'].'" }';


        
    }


}


?>