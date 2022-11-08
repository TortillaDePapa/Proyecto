<?php
include_once 'Persistencia/ClasePersonaBD.php';
include_once 'Clases/ClasePersona.php';
include_once 'Clases/ClaseUsuario.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="CSS/DiseñoLogin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="body-dark bg-dark">
    <div class="Centrar" >
        <h1>
            Reactivar cuenta 
        </h1>
            <form action="" method="post" autocomplete="off">
                <div class="texto"> <input type="text" name="usuario" required> 
                    <span>

                    </span> <label>
                                 Usuario 
                        </label>
                </div>
                <div class="texto"> <input type="password" name="contraseña"required> 
                    <span>

                    </span> <label>
                                Contraseña
                            </label> 
                </div>
                <div class="contraseña" ><a href="Reactivar.php">¿Quieres reactivar tu cuenta?</a> </div>
                <input type="Submit" value="Reactivar" name="Reactivar">
                <div class="Registro"> 
                <a href="Login.php">   ¿Ya reactivaste la cuenta? </a>
                </div>
                
            </form>

</div>

<?php

if(isset($_POST['Reactivar'])){
    $p = new Persona();
    $p1 = new PersonaBD();
    $p -> setUsuario($_POST['usuario']);
    $p -> setContraseña(md5($_POST['contraseña']));
    $p1 -> ReactivarCuenta($p);
  }
  ?>
</body>
</html>