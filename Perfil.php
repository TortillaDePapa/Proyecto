<?php
include_once 'Clases/ClasePersona.php';
include_once 'Persistencia/ClasePersonaBD.php';
include_once 'Persistencia/ClaseProductoBD.php';




session_start();


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
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <title>TITLE</title>


</head>

<body>

  <!-- Navbar -->

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="PagPrincipal.php">AutoServicio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active " aria-current="page" href="Local.php">Local</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle me-2" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Categorias
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Limpieza</a> </li>
              <!-- <li><hr class="dropdown-divider"></li> -->
              <li><a class="dropdown-item" href="#">Hogar</a></li>
              <li><a class="dropdown-item" href="#">Carniceria</a></li>
            </ul>
          </li>
        </ul>
        <input class="form-control me-3" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-buttom btn-custom me-1 boton" type="submit"> </button>

        <?php
            echo"<button class='btn btn-buttom btn-custom me-1'  type='submit' onclick='Cerrar()'>  <i class='bi bi-box-arrow-in-right'></i> </button>";          
           
            if(isset($_SESSION['CLIENTE'])){
            echo "<div class='dropdown'>";
            echo "<button class='btn btn-buttom btn-secondary dropdown-toggle bg-dark' type='button' data-bs-toggle='dropdown' aria-expanded='false'>";
            echo "<i class='icon bi-person-fill'></i>";
            echo "<span class='position-absolute top-1 start-95 translate-middle p-1 bg-success border border-light rounded-circle'>";
            echo" <span class='visually-hidden'>New alerts</span> ";
            echo" </span>";
            echo " </button>";
            echo "<ul class='dropdown-menu'>";
            echo "<li><a class='dropdown-item NoSelect' href='Perfil.php'>".$_SESSION['CLIENTE']-> getNombre()."</a></li>";
            echo "</ul>";
            echo "</div>";
            }else{
              if(isset($_SESSION['ADMIN'])){
              echo "<div class='dropdown'>";
              echo "<button class='btn btn-buttom btn-secondary dropdown-toggle bg-dark' type='button' data-bs-toggle='dropdown' aria-expanded='false'>";
              echo "<i class='icon bi-person-fill'></i>";
              echo " </button>";
              echo "<ul class='dropdown-menu'>";
              echo "<li><a class='dropdown-item NoSelect' href='Perfil.php'>".$_SESSION['ADMIN']-> getNombre()."</a></li>";
              echo "</ul>";
              echo "</div>";
            }else{
              echo"<a href='Login.php'> <button class='btn btn-buttom btn-custom me-1'  type='submit'>  <i class='bi bi-person-fill'></i> </button></a>";
            }
          }
            echo "<button class='btn btn-buttom btn-custom'  type='submit'> <i class='icon bi-cart3'></i> </button>";
           ?>
      </div>
    </div>
  </nav>

  <?php
  if(!isset($_SESSION['CLIENTE'])){
    header("Location: PagPrincipal.php");
  }
  
  ?>



  <!-- Formato Perfil -->

  <div class="container">
    <div class="row">
      <div class="col-md-12 offset-md-4">
        <div class="col-12">
          <div class="col-5">

             <!--   boton de perfil -->

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link bg-dark" id="pills-profile-tab" data-bs-toggle="pill"
                  data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                  aria-selected="false">Perfil</button>

              </li>

                 <!--   espacio en blanco -->


              <li class="nav-item" role="presentation">
                <button class="nav-link bg-light" id="" data-bs-toggle=""
                  data-bs-target="" type="button" role="tab" aria-controls=""
                  aria-selected="false" disabled></button>

              </li>

                 <!--   boton de modificar -->


              <li class="nav-item" role="presentation">
                <button class="nav-link bg-dark" id="pills-contact-tab" data-bs-toggle="pill"
                  data-bs-target="#pills-contact1" type="button" role="tab" aria-controls="pills-contact"
                  aria-selected="false">Modificar datos</button>
              </li>

                 <!--   espacio en blanco -->

              <li class="nav-item" role="presentation">
                <button class="nav-link bg-light" id="" data-bs-toggle=""
                  data-bs-target="" type="button" role="tab" aria-controls=""
                  aria-selected="false" disabled></button>

              </li>
                 <!--   boton de eliminar -->

                 <li class="nav-item" role="presentation">
                 <button class="nav-link bg-dark" id="pills-home-tab" 
                 data-bs-toggle="pill" data-bs-target="#pills-home1" type="button" 
                 role="tab" aria-controls="pills-home" aria-selected="false"> Eliminar cuenta</button>
                </li>


</ul>

<div class="tab-content" id="pills-tabContent">


              <!--   Perfil -->

              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">
                <div class="col-12">
                  <div class="col-5">
                    <img class="img-thumbnail"
                      src="http://pm1.narvii.com/6880/0b2cc13eba0822a642b4d82d241bc695d59e310er1-400-400v2_uhq.jpg"
                      alt="">

                  </div>
                  <div class="col-7">

                    <div class="form-group row">

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
                    <br>
                    <div class="form-group text-center">

                    </div>


                  </div>



                </div>
              </div>

              <!--  Modificar -->

              <div class="tab-pane fade" id="pills-contact1" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">

                <div class="col-12">

                  <div class="col-7">
                    <div class="form-group row">

                      <?php

              echo"       <label for='usuario' class='col-4'></label>";
              echo"       <div class='col-8'>";
              echo"         <input type='hidden' class='form-control' value='".$_SESSION['CLIENTE'] -> getIDPersona()."' >";
              echo"      </div>";

              echo"    <label for='codigo' class='col-4'>Usuario:  </label>";
              echo"    <div class='col-8'>";
              echo"      <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getUsuario()."'>";
              echo"    </div>";

              echo"    <label for='codigo' class='col-4'>Actual contraseña:  </label>";
              echo"    <div class='col-8'>";
              echo"      <input type='text' class='form-control' value=''>";
              echo"    </div>";

              echo"    <label for='codigo' class='col-4'>Nueva contraseña:  </label>";
              echo"    <div class='col-8'>";
              echo"      <input type='text' class='form-control' value=''>";
              echo"    </div>";

              echo"    <label for='codigo' class='col-4'>Nombre:  </label>";
              echo"    <div class='col-8'>";
              echo"      <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getNombre()."'>";
              echo"    </div>";

              echo"    <label for='codigo' class='col-4'>Apellido:  </label>";
              echo"    <div class='col-8'>";
              echo"      <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getApellido()."'>";
              echo"    </div>";


              echo"    <label for='codigo' class='col-4'>Gmail:  </label>";
              echo"    <div class='col-8'>";
              echo"      <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getGmail()."'>";
              echo"    </div>";


              echo"    <label for='codigo' class='col-4'>Telefono:  </label>";
              echo"    <div class='col-8'>";
              echo"      <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getTelefono()."'>";
              echo"    </div>";


              echo"    <label for='codigo' class='col-4'>Calle:  </label>";
              echo"    <div class='col-8'>";
              echo"      <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getNombreCalle()."'>";
              echo"    </div>";


              echo"    <label for='codigo' class='col-4'>Nro de casa:  </label>";
              echo"    <div class='col-8'>";
              echo"      <input type='text' class='form-control' value='".$_SESSION['CLIENTE'] -> getNumeroCasa()."'>";
              echo"    </div>";


              

                ?>
<h1>Mamabicho</h1>
                      <br>

                      <div class="form-group text-center">
                        <button class="btn btn-danger">Actualizar</button>

                      </div>



                    </div>



                  </div>
                </div>

              </div>

              <!--  Borrar -->
              
            <div class="tab-pane fade " id="pills-home1" role="tabpanel" aria-labelledby="pills-home-tab"   >

              <div class="col-12">

                <div class="col-7">
                  
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
 echo"      <input type='text' class='form-control' value='' name='Contraseña'>";
 echo"    </div>";
 
 
 ?>
           
           <br>

<div class="form-group text-center">
  <input type="submit" value="Eliminar" name="Eliminar">
  </form>
</div>


</div>
</div>
</div>
            </div>
          </div>
        </div>

      </div>
    </div>

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

?>

</body>

</html>

<!--   
          <div class="col-12">
            <div class="col-5">
              <img class="img-thumbnail"
                src="https://w7.pngwing.com/pngs/811/233/png-transparent-computer-icons-user-login-desktop-others-blue-computer-prints.png"
                alt="">

            </div>
            <div class="col-7">
              <div class="form-group row">
                <label for="codigo" class="col-4">codigo: </label>
                <div class="col-8">
                  <input type="text" class="form-control" value="00054DE">
                </div>
                <br>
              </div>
              <div class="form-group row">
                <label for="usuario" class="col-4">usuario: </label>
                <div class="col-8">
                  <input type="text" class="form-control" value="Lucas">
                </div>
                <br>

              </div>
              <div class="form-group row">
                <label for="email" class="col-4">email: </label>
                <div class="col-8">
                  <input type="text" class="form-control" value="lucas@gmail.com">
                </div>
                <br>
              </div>
              <div class="form-group text-center">
                <button class="btn btn-info">Actualizar</button>
                 <button class="btn btn-danger">Actualizar</button>
            </div>
            
            </div>

          </div>

          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

          </div>
        </div> -->


         <!-- </div>
           <div class="form-group row">
             <label for="email" class="col-4"> email: </label>
             <div class="col-8">
               <input type="text" class="form-control" value="" placeholder="lucas@gmail.com" >
             </div>
             <br>
           </div>
           <div class="form-group row">
             <label for="email" class="col-4"> numero: </label>
             <div class="col-8">
               <input type="text" class="form-control" value="" placeholder="numero" >
             </div>  -->