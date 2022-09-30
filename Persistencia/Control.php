<?php

session_start();

if(isset($_POST['Cerrar'])){
    if(isset($_SESSION['CLIENTE'])){
        session_destroy();
       
    }
}
?>