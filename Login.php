<?php
include_once 'Persistencia/ClasePersonaBD.php';
include_once 'Clases/ClaseCliente.php';
include_once 'Clases/ClasePersona.php';
include_once 'Clases/ClaseUsuario.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="CSS/DiseñoLogin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="body-dark bg-dark">
    <div class="Centrar" >
        <h1>
            Login
        </h1>
            <form action="Login.php" method="post">
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
                <div class="contraseña" ><a href="">¿Olvidaste tu contraseña?</a> </div>
                <input type="Submit" value="Iniciar" name="Login">
                <div class="Registro"> 
                <a href="Registro.php">  ¿No tienes cuenta?  </a>
                </div>
                
            </form>

</div>

<?php

 if(isset($_POST['Login'])){
       
    $p = new Cliente();
    $p1 = new Usuario();
    $p2 = new PersonaBD();
    $p -> setUsuario($_POST['usuario']);
    $p -> setContraseña(md5($_POST['contraseña']));


    $p2 -> LoginPersona($p,$p1);
}
?>
</body>
</html>