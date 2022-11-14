<?php
include_once 'Persistencia/ClasePersonaBD.php';
include_once 'Clases/ClasePersona.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/DiseñoLogin.css">
    <title>Document</title>
</head>
<body>

<div class="container">
        
    <div class="Centrar">
            <form action="Registro.php" method="post" autocomplete="off">
            <h1>Registro</h1>
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
                <div class="texto"> <input type="text" required name="Telefono" minlength="9" maxlength="9"> 
                    <span>

                    </span> <label>
                                  Ingrese su telefono   
                        </label>
                </div>
                <div class="texto"> <input type="text" required name="Calle" > 
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
                <div> <a href="Reactivar.php">¿Quieres recuperar tu cuenta?</a> </div>
               <div> <a href="Login.php">  ¿Ya tiene una cuenta?  </a>  </div>
                
                </div>
              
            </form>
          
        </div>
      </div>

    
</body>
<?php
  
  if(isset($_POST['registrar'])){
    if(is_string($_POST['usuario'])){
       if(filter_var($_POST['gmail'], FILTER_VALIDATE_EMAIL)){
        if(is_numeric($_POST['Telefono'])){
            $p = new Persona();
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
            }else{
                echo "<script>alert('no se pudo registrar su cuenta')</script>";
            }
        }
    }
}
?>

</html>