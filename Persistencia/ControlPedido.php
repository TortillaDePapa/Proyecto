<?php

        include_once 'conexion.php';

        if(isset($_POST['ActualizarC1'])){
        $newConn = new Conexion();
        $newConn -> Conectar();
        $id = $_POST['ActualizarC1'];
        echo $id;
        $sql = "UPDATE Envios set Estados = 2 where IDEnvio = $id ";
        $result = mysqli_query($newConn -> conn, $sql);




        }










        if(isset($_POST['ActualizarC2'])){
            $newConn = new Conexion();
            $newConn -> Conectar();
            $id = $_POST['ActualizarC2'];
    
            $sql = "UPDATE Envios set Estados = 3 where IDEnvio = $id ";
            $result = mysqli_query($newConn -> conn, $sql);

        }


?>