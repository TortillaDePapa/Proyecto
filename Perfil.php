<?php
include_once 'Clases/ClasePersona.php';
include_once 'Persistencia/ClasePersonaBD.php';
include_once 'Persistencia/ClaseProductoBD.php';




session_start();


if(!isset($_SESSION['CLIENTE'])){
  header("Location: index.php");
}


?>
<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="CSS/principal.css">

  <!-- Icon Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  <title>TITLE</title>


</head>

<body>

  <?php
    include "navbar.php";
    
    ?>


  <!-- Formato Perfil -->

  <div class="container">
    <div class="row">
      <div class="col">
        <nav>

          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active bg-dark" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
              type="button" role="tab" aria-controls="nav-home" aria-selected="true">
              Perfil
            </button>
            <button class="nav-link bg-dark" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
              type="button" role="tab" aria-controls="nav-profile" aria-selected="true">
              Modificar
            </button>
            <button class="nav-link bg-dark" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
              type="button" role="tab" aria-controls="nav-contact" aria-selected="true">
              Eliminar
            </button>
          </div>
        </nav>


        <!-- Perfil -->

        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
            tabindex="0">


            1

            <?php
           echo"       <label for='usuario' class='col-4'></label>";
           echo"       <div class='col-8'>";
           echo"         <input type='hidden' class='form-control' value='".$_SESSION['CLIENTE'] -> getIDPersona()."' >";
           echo"      </div>";
           echo"       <label for='usuario' class='col-4'>usuario: </label>";
           echo"       <div class='col-8'>";
           echo"         <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getUsuario()."' placeholder='' disabled >";
           echo"      </div>";
           echo"      <br>";
           echo"      <label for='usuario' class='col-4'>Nombre: </label> ";
           echo"      <div class='col-8'>";
           echo"         <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getNombre()."' placeholder='' disabled  >";
           echo"      </div>";
           echo"       <br>";
           echo"       <label for='usuario' class='col-4'>Apellido: </label>";
           echo"       <div class='col-8'> ";
           echo"         <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getApellido()."' placeholder=''  disabled >";
           echo"      </div>";
           echo"       <br>";
           echo"       <label for='usuario' class='col-4'>Telefono: </label>";
           echo"       <div class='col-8'> ";
           echo"         <input type='number' class='form-control' value='".$_SESSION['CLIENTE'] -> getTelefono()."' placeholder=''  disabled >";
           echo"      </div>";
           echo"       <br>";
           echo"       <label for='usuario' class='col-4'>Calle: </label>";
           echo"       <div class='col-8'> ";
           echo"         <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getNombreCalle()."' placeholder=''  disabled >";
           echo"      </div>";
           echo"       <br>";
           echo"       <label for='usuario' class='col-4'>Numero Casa: </label>";
           echo"       <div class='col-8'> ";
           echo"         <input type='number' class='form-control' value='".$_SESSION['CLIENTE'] -> getNumeroCasa()."' placeholder=''  disabled >";
           echo"      </div>";
           echo"       <br>";
          

                
                  ?>


          
          </div>

                  <!-- End Perfil -->


        <!-- Modificar Datos -->


          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
          
          2

          <form action="" method="post">

            <?php

  echo"       <label for='usuario' class='col-4'></label>";
  echo"       <div class='col-8'>";
  echo"         <input type='hidden' class='form-control' value='".$_SESSION['CLIENTE'] -> getIDPersona()."' name='IDPersona'>";
  echo"      </div>";

  echo"    <label for='codigo' class='col-4'>Usuario:  </label>";
  echo"    <div class='col-8'>";
  echo"      <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getUsuario()."' name='usuario'>";
  echo"    </div>";

  echo"    <label for='codigo' class='col-4'>Actual contraseña:  </label>";
  echo"    <div class='col-8'>";
  echo"      <input type='password' class='form-control' value='' name='contraseña'>";
  echo"    </div>";



  echo"    <label for='codigo' class='col-4'>Nombre:  </label>";
  echo"    <div class='col-8'>";
  echo"      <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getNombre()."' name='nombre'>";
  echo"    </div>";

  echo"    <label for='codigo' class='col-4'>Apellido:  </label>";
  echo"    <div class='col-8'>";
  echo"      <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getApellido()."' name='apellido'>";
  echo"    </div>";


  echo"    <label for='codigo' class='col-4'>Gmail:  </label>";
  echo"    <div class='col-8'>";
  echo"      <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getGmail()."' name='gmail'>";
  echo"    </div>";


  echo"    <label for='codigo' class='col-4'>Telefono:  </label>";
  echo"    <div class='col-8'>";
  echo"      <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getTelefono()."' name='Telefono'>";
  echo"    </div>";


  echo"    <label for='codigo' class='col-4'>Calle:  </label>";
  echo"    <div class='col-8'>";
  echo"      <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getNombreCalle()."' name='Calle'>";
  echo"    </div>";


  echo"    <label for='codigo' class='col-4'>Nro de casa:  </label>";
  echo"    <div class='col-8'>";
  echo"      <input type='number' class='form-control' value='".$_SESSION['CLIENTE'] -> getNumeroCasa()."' name='NumeroCasa'> ";
  echo"    </div>";


  

    ?>

            <br>

            <div class="form-group text-center">
              <input type="submit" value="Actualizar datos de la cuenta" name="ActualizarDatos">

            </div>
          </form>

          </div>

            <!-- End Modificar Datos -->
            
                 

            
             <!-- Eliminar cuenta -->

          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
           

          3

          <form action="" method="post">
            <?php

echo"       <label for='usuario' class='col-4'></label>";
echo"       <div class='col-8'>";
echo"         <input type='hidden' class='form-control' value='".$_SESSION['CLIENTE'] -> getIDPersona()."' >";
echo"      </div>";

echo"    <label for='codigo' class='col-4'>Usuario:  </label>";
echo"    <div class='col-8'>";
echo"      <input type='text' class='form-control' value='' name='Usuario'>";
echo"    </div>";

echo"    <label for='codigo' class='col-4'>Contraseña:  </label>";
echo"    <div class='col-8'>";
echo"      <input type='password' class='form-control' value='' name='Contraseña'>";
echo"    </div>";


?>

            <br>

            <div class="form-group text-center" id="Alert">
              <input type="submit" value="Eliminar" name="Eliminar" id="LiveAlert">
        </div>
      </form>


          </div>
           <!-- End Eliminar cuenta -->

        </div>
        <!-- tab content -->

      </div>
      <!-- end col -->

    </div>
      <!-- end row -->

  </div> 
  <!-- end container -->




  

  <script>
    function Cerrar() {
      var obAjax = new XMLHttpRequest();
      obAjax.open('POST', 'Persistencia/Control.php', true);
      obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      obAjax.onreadystatechange = function () {
        window.location.reload();
      }
      obAjax.send('Cerrar');
    }
  </script>

  <?php
if(isset($_POST['Eliminar'])){
  $p = new Persona();
  $p1 = new PersonaBD();
  $p -> setUsuario($_POST['Usuario']);
  $p -> setContraseña(md5($_POST['Contraseña']));
  $p1 -> EliminarCuenta($p);
}


  if(isset($_POST['ActualizarDatos'])){
    $p = new Persona();
    $p1 = new PersonaBD();
    $p -> setIDPersona($_POST['IDPersona']);
    $p -> setUsuario($_POST['usuario']);
    $p -> setContraseña(md5($_POST['contraseña']));
    $p -> setNombre($_POST['nombre']);
    $p -> setApellido($_POST['apellido']);
    $p -> setGmail($_POST['gmail']);
    $p -> setTelefono($_POST['Telefono']);
    $p -> setNumeroCasa($_POST['NumeroCasa']);
    $p -> setNombreCalle($_POST['Calle']);
    
    $p1 -> ModificarDatos($p);
  }
?>

</body>

</html>