<?php
include_once 'Persistencia/ClasePersonaBD.php';
include_once 'Clases/ClaseCliente.php';
include_once 'Clases/ClasePersona.php';
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
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/DiseñoLogin.css">
    <title>Document</title>
</head>
<body>
    <div class="Centrar">
        <h1>Registro</h1>
            <form action="Registro.php" method="post">
                <div class="texto"> <input type="text" required name="usuario"> 
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
                <div class="texto"> <input type="password" required name="ccontraseña"> 
                    <span>

                    </span> <label>
                                Confirme su contrseña
                        </label>
                </div>
                <div class="texto"> <input type="text" required name="nombre"> 
                    <span>

                    </span> <label>
                                  Ingrese su nombre   
                        </label>
                </div>
                <div class="texto"> <input type="text" required name="apellido"> 
                    <span>

                    </span> <label>
                                  Ingrese su apellido   
                        </label>
                </div>
                <div class="texto"> <input type="text" required name="gmail"> 
                    <span>

                    </span> <label>
                                  Ingrese su gmail
                        </label>
                </div>
                <div class="texto"> <input type="text" required name="Telefono"> 
                    <span>

                    </span> <label>
                                  Ingrese su telefono   
                        </label>
                </div>
                <div class="texto"> <input type="text" required name="Calle"> 
                    <span>

                    </span> <label>
                                  Ingrese la calle de su casa 
                        </label>
                </div>
                <div class="texto"> <input type="text" required name="NumeroCasa"> 
                    <span>

                    </span> <label>
                                  Ingrese el numero de su casa
                        </label>
                </div>
                <input type="submit" value="Registrarse" name="registrar">
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
    $p -> setUsuario($_POST['usuario']);
    $p -> setContraseña(md5($_POST['contraseña']));
    $p -> setCContraseña(md5($_POST['ccontraseña']));
    $p -> setNombre($_POST['nombre']);
    $p -> setApellido($_POST['apellido']);
    $p -> setGmail($_POST['gmail']);
    $p -> setTelefono($_POST['Telefono']);
    $p -> setNumeroCasa($_POST['NumeroCasa']);
    $p -> setNombreCalle($_POST['Calle']);
    
    $p2 -> CargarPersona($p);
}
?>

</html>