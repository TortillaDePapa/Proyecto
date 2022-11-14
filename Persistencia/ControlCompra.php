<?php 
include_once 'conexion.php';
if (session_status() == PHP_SESSION_NONE){
    session_start();
}


if(isset($_POST['FinalizarCompra'])){
    date_default_timezone_set('America/Montevideo');
    $envio = $_POST['MetodoEnvio'];
    $metodoPago = $_POST['MetodoPago'];
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
                
                if($_SESSION['MostrarCarrito'][$i] != null){
                $sql1  = "INSERT into selecciona(IDCliente,IDproducto,CantidadProducto,MetodoDePago,MetodoEnvio) VALUES('".$fila['idpersona']."', '".$_SESSION['MostrarCarrito'][$i]['id']."', '".$_SESSION['MostrarCarrito'][$i]['Cantidad']."','".$metodoPago."', '".$envio."')";
                $resultado1 = mysqli_query($newConn -> conn, $sql1);
                 if($resultado1){
                    $sql2 = "SELECT idcliente  FROM selecciona WHERE idcliente = '".$_POST['usuario']."'" ;
                    $resultado2 = mysqli_query($newConn -> conn, $sql2);
                    $fila1 = mysqli_fetch_assoc($resultado2);
                    $fechaActual = date('y-m-d H:m:s');
                    echo $fila1['idcliente'];
                    if($resultado2){
                    $sql3  = "INSERT into Compras(IDCliente,IDproducto,Fecha,Total) VALUES('".$fila1['idcliente']."', '".$_SESSION['MostrarCarrito'][$i]['id']."', '".$fechaActual."', '".$_SESSION['MostrarCarrito'][$i]['Precio']*$_SESSION['MostrarCarrito'][$i]['Cantidad']."')";
                    $resultado3 = mysqli_query($newConn -> conn, $sql3);
                   
                     if($resultado3){
                        $sql7 ="SELECT NumeroPuerta, calle from clientes where IDCliente = '".$_POST['usuario']."' ";
                        $resultado7 = mysqli_query($newConn -> conn, $sql7);
                        $fila4 = mysqli_fetch_assoc($resultado7);
                        $sql5 = "SELECT IDCompra from Compras";
                        $resultado5 = mysqli_query($newConn -> conn, $sql5);
                        $fila2 = mysqli_fetch_assoc($resultado5);
                        $sql6 = "SELECT IDusuario from usuario";
                        $resultado6 = mysqli_query($newConn -> conn, $sql6);
                        $fila3 = mysqli_fetch_assoc($resultado6);
                        $sql4 = "INSERT into Envios(Direccion,IDCompra,IDUsuario,IDCliente,IDProducto,Estados) VALUES('".$fila4['calle']."".$fila4['NumeroPuerta']."','".$fila2['IDCompra']."','".$fila3['IDusuario']."','".$fila1['idcliente']."','".$_SESSION['MostrarCarrito'][$i]['id']."', '1')";
                        $resultado4 = mysqli_query($newConn -> conn, $sql4);
                        if($resultado4){
                            unset($_SESSION['MostrarCarrito'][$i]);
                            echo "<script> window.location('index.php')</script>";
                        }

                     }
                    }
                 }
                }     
            }

        }
       }
    }
   
}



?>
