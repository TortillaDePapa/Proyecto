<?php

session_start();

if(isset($_POST['Cerrar'])){
    if(isset($_SESSION['CLIENTE']) or isset($_SESSION['ADMIN'])){
        unset($_SESSION['CLIENTE']);
        unset($_SESSION['ADMIN']);

       
    }
}

if(isset($_POST['EliminarCarro'])){
    if(isset($_SESSION['MostrarCarrito'])){
        unset($_SESSION['MostrarCarrito']);
    }

}

?>