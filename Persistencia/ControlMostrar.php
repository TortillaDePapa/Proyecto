<?php
include_once 'conexion.php';


if(isset($_POST['MostrarProducto'])){
    $newConn = new Conexion(); 
           $IDProducto = $_POST['IDProducto'];
           $sql = "SELECT * from productos where IDProducto = ".$IDProducto."";
           $newConn -> Conectar();
           $resultado = mysqli_query($newConn -> conn, $sql);
           $fila = mysqli_fetch_assoc($resultado);
        if($resultado -> num_rows > 0)
            echo '{"ID": "'.$IDProducto.'", "CodBarra": "'.$fila['CodigoBarra'].'","Descripcion": "'.$fila['Descripcion'].'","Stock": "'.$fila['Stock'].'", "NombreProducto":"'.$fila['Nombre'].'", "Precio": "'.$fila['Precio'].'"}';


       }else{
        echo"<script>alert('No hay ningun articulo con ese codigo de barras')";
       }


      ?> 