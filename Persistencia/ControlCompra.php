<?php 
include_once 'conexion.php';
if (session_status() == PHP_SESSION_NONE){
    session_start();
}


if(isset($_POST['FinalizarCompra'])){
    $newConn = new Conexion(); 
    $newConn -> Conectar();
    echo $_POST['usuarioo'];
    // $sql = "SELECT IDCLiente, IDpersona from clientes, personas where personas.Usuario = '".$_POST['usuarioo']."' AND personas.IDpersona = clientes.IDcliente "; 
    // $result = mysqli_query($newConn -> conn, $sql);
    // if($result){
       if(isset($_SESSION['CLIENTE'])){
        if(isset($_SESSION['MostrarCarrito'])){
            for($i = 1; $i <count($_SESSION['MostrarCarrito']); $i++){
                $sql1  = "INSERT into selecciona(IDCliente,IDproducto,CantidadProducto) VALUES('".$_POST['usuarioo']."', '".$_SESSION['MostrarCarrito'][$i]['id']."', '".$_SESSION['MostrarCarrito'][$i]['Cantidad']."')";
                $resultado = mysqli_query($newConn -> conn, $sql1);
                if($resultado){
                    unset($_SESSION['MostrarCarrito']);
                }
            }
        }
       }
    // }
   
}



?>
