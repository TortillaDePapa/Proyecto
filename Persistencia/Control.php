<?php

session_start();

if(isset($_POST['Cerrar'])){
    if(isset($_SESSION['CLIENTE']) or isset($_SESSION['ADMIN'])){
        session_destroy();
       
    }



    if(isset($_POST['MostrarProducto'])){

        
    }
}
?>