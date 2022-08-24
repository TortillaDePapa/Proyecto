<?php
include_once '../Logica/Persona.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/DiseñoLogin.css">
    <title>Document</title>
</head>
<body>
    <div class="Centrar">
        <h1>Registro</h1>
            <form action="post">
                <div class="texto"> <input type="text" required name="nombreUser"> 
                    <span>

                    </span> <label>
                                 Ingrese su usuario 
                        </label>
                </div>
                <div class="texto"> <input type="password" required name="contraseña"> 
                    <span>

                    </span> <label>
                                Ingrese su contrseña
                        </label>
                </div>
                <div class="texto"> <input type="text" required name="apellido"> 
                    <span>

                    </span> <label>
                                  Ingrese su apellido   
                        </label>
                </div>
                <div class="texto"> <input type="text" required name="nombre"> 
                    <span>

                    </span> <label>
                                  Ingrese su nombre   
                        </label>
                </div>
                <div class="texto"> <input type="text" required name="email"> 
                    <span>

                    </span> <label>
                                  Ingrese su E-mail   
                        </label>
                </div>
                <input type="Submit" value="Registrarse" name="registro">
                <div class="Registro"> 
                <a href="Login.php">  ¿Ya tiene una cuenta?  </a>
                </div>
            </form>
    </div>
    
</body>
<?php
  
  if(isset($_POST['registrar'])){
    $p = new Cliente();
    $p2 = new PersonaBD();
    $p -> setUsuario($_POST['Usuario']);
    $p -> setContraseña(md5($_POST['Contraseña']));
    $p -> setCContraseña(md5($_POST['CContraseña']));
    $p -> setNombre($_POST['Nombre']);
    $p -> setApellido($_POST['Apellido']);
    $p -> setTelefono($_POST['Telefono']);
    $p -> setNumeroCasa($_POST['NumeroDeCasa']);
    $p -> setNombreCalle($_POST['NombreDeCalle']);
    
    $p2 -> CargarPersona($p);
}
?>

</html>