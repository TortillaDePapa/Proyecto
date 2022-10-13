<?php
include_once 'conexion.php';
session_start();

if (isset($_POST['id'])) {
    $newConn = new Conexion(); 
    $IDProducto = $_POST['id'];
    $sql = "SELECT * from productos where IDProducto = ".$IDProducto."";
    $newConn -> Conectar();
    $resultado = mysqli_query($newConn -> conn, $sql);
    $MostrarCarrito[] =  array();
    if($resultado){
        while($row = $resultado -> fetch_assoc()){
            $MostrarCarrito= array ( 
        'id'        =>   $row['IDProducto'],
        'Imagen'    =>    $row['Imagen'],
        'Nombre'    =>    $row['Nombre'],
        'Precio'    =>    $row['Precio'], 
        // "Cantidad" =>
          );
        }
        echo "10";
        if(isset($_SESSION['MostrarCarrito'])){
            

             
        }else{
            $_SESSION['MostrarCarrito'] = $MostrarCarrito;
            echo  $MostrarCarrito['id'];
            
        }
    }else{
        echo "error";
    }
  
    
}


      ?> 