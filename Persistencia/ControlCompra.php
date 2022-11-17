<?php 
include_once 'conexion.php';
if (session_status() == PHP_SESSION_NONE){
    session_start();
}


if(isset($_POST['FinalizarCompra'])){
        date_default_timezone_set('America/Montevideo');
        $envio = $_POST['MetodoEnvio'];
        echo $envio;
        $metodoPago = $_POST['MetodoPago'];
        echo $metodoPago;
        $newConn = new Conexion(); 
        $newConn -> Conectar();
        $sql10 = "INSERT into idcompras VALUES(null)";
        $resultado10 = mysqli_query($newConn -> conn, $sql10);
        $sql7 ="SELECT NumeroPuerta, calle from clientes where IDCliente = '".$_POST['usuario']."' ";
        $resultado7 = mysqli_query($newConn -> conn, $sql7);
        $fila4 = mysqli_fetch_assoc($resultado7);
        $sql9 = "SELECT IDCompra from idcompras order by idcompra desc";
        $resultado9 = mysqli_query($newConn -> conn, $sql9);
        $fila5 = mysqli_fetch_assoc($resultado9);
        $sql6 = "SELECT IDusuario from usuario";
        $resultado6 = mysqli_query($newConn -> conn, $sql6);
        $fila3 = mysqli_fetch_assoc($resultado6);
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
                                    $fechaActual = date('y-m-d H:i:s');
                                    echo $fila1['idcliente'];
                                        if($resultado2){
                                            $sql3  = "INSERT into Compras(IDCompra,IDCliente,IDproducto,Fecha,Total,CantidadProducto) VALUES('".$fila5['IDCompra']."','".$fila1['idcliente']."', '".$_SESSION['MostrarCarrito'][$i]['id']."', '".$fechaActual."', '".$_SESSION['MostrarCarrito'][$i]['Precio']*$_SESSION['MostrarCarrito'][$i]['Cantidad']."', '".$_SESSION['MostrarCarrito'][$i]['Cantidad']."')";
                                            $resultado3 = mysqli_query($newConn -> conn, $sql3);
                                            $sql5 = "SELECT IDCompra from Compras order by IDCompra desc" ;
                                            $resultado5 = mysqli_query($newConn -> conn, $sql5);
                                            $fila2 = mysqli_fetch_array($resultado5);  
                                            echo var_dump($fila2);
                                            
                                        }
                            }
                }     
            }
           
                $sql11 = "INSERT into idenvios VALUES(null)";
                $resultado11 = mysqli_query($newConn -> conn, $sql11);
                $sql12 = "SELECT idenvio from idenvios order by idenvio desc";
                $resultado12 = mysqli_query($newConn -> conn, $sql12);
                $fila8 = mysqli_fetch_assoc($resultado12);
                echo var_dump($fila8['idenvio']);
                    if($resultado3){
                        $sql4 = "INSERT into Envios(IDEnvio,Direccion,IDCompra,IDUsuario,Estados,MetodoEnvio) VALUES('".$fila8['idenvio']."','".$fila4['calle']."".$fila4['NumeroPuerta']."','".$fila2['IDCompra']."','".$fila3['IDusuario']."', '1', '".$envio."')";
                        $resultado4 = mysqli_query($newConn -> conn, $sql4);
                            if($resultado4){
                                unset($_SESSION['MostrarCarrito']);
                                echo "<script> window.location('index.php')</script>";
                            }

                    }
            
            unset($_SESSION['MostrarCarrito']);
        }
       }
    }
   
}



?>
