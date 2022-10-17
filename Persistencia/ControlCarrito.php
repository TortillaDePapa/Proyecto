<?php

include_once 'conexion.php';
session_start();

if (isset($_POST['id'])) {
    $existe = false;
    $newConn = new Conexion(); 
    $IDProducto = $_POST['id'];
    $cantidad = $_POST['Cantidad'];
    $Precio = $_POST['Precio'];
    $sql = "SELECT * from productos where IDProducto = ".$IDProducto."";
    $newConn -> Conectar();
    $resultado = mysqli_query($newConn -> conn, $sql);

    if($resultado){
        while($row = $resultado -> fetch_assoc()){
            $MostrarCarrito[]= array ( 
        'id'        =>    $row['IDProducto'],
        'Imagen'    =>    $row['Imagen'],
        'Nombre'    =>    $row['Nombre'],
        'Precio'    =>    $Precio, 
        'Cantidad'  =>    $cantidad
          );
        }

        if(isset($_SESSION['MostrarCarrito'])){

            for($i = 0; $i <count($_SESSION['MostrarCarrito']); $i++){

                if($_SESSION['MostrarCarrito'][$i]['id'] == $IDProducto){

                    $_SESSION['MostrarCarrito'][$i]['Cantidad']++;
                    $existe = true;

                }
                

            }  
            if($existe == false){

            }           

        }else{
            $_SESSION['MostrarCarrito'] = $MostrarCarrito;
            
            
        }
    }else{
        echo "error";
    }
  
    
}

      ?> 