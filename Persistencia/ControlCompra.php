<?php 
include_once 'conexion.php';
if (session_status() == PHP_SESSION_NONE){
    session_start();
}


if(isset($_POST['FinalizarCompra'])){
    $newConn = new Conexion(); 
    $newConn -> Conectar();
    $sql = "SELECT idpersona FROM personas WHERE idpersona = '".$_POST['usuario']."'" ;
    $resultado = mysqli_query($newConn -> conn,$sql);
    if($resultado){
        $fila = mysqli_fetch_assoc($resultado);
        echo var_dump($fila['idpersona']);
       if(isset($_SESSION['CLIENTE'])){
        if(isset($_SESSION['MostrarCarrito'])){
            for($i = 0; $i <count($_SESSION['MostrarCarrito']); $i++){
                $sql1  = "INSERT into selecciona(IDCliente,IDproducto,CantidadProducto) VALUES('".$fila['idpersona']."', '".$_SESSION['MostrarCarrito'][$i]['id']."', '".$_SESSION['MostrarCarrito'][$i]['Cantidad']."')";
                $resultado = mysqli_query($newConn -> conn, $sql1);
                if($resultado){
                  
                }
            }
        }
       }
    }
   
}



?>
