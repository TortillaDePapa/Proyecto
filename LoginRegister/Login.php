<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="../CSS/DiseñoLogin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="Centrar">
        <h1>
            Login
        </h1>
            <form action="post">
                <div class="texto"> <input type="text" required> 
                    <span>

                    </span> <label>
                                 Usuario 
                        </label>
                </div>
                <div class="texto"> <input type="password" required> 
                    <span>

                    </span> <label>
                                Contraseña
                            </label> 
                </div>
                <div class="contraseña"> ¿Olvidaste tu contraseña? </div>
                <input type="Submit" value="Iniciar">
                <div class="Registro"> 
                <a href="Registro.php">  ¿No tienes cuenta?  </a>
                </div>
                
            </form>

</div>

<?php

 if(isset($_POST['Login'])){
       
    $p = new Cliente();
    $p2 = new PersonaBD();
    $p -> setUsuario($_POST['usuario']);
    $p -> setContraseña(md5($_POST['contraseña']));


    $p2 -> LoginPersona($p);
}


?>
</body>
</html>