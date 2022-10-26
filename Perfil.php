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
            <div class="col-md-12 offset-md-4">
                <div class="col-12">
                    <div class="col-5">

                        <!--   boton de perfil -->

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link bg-dark" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">Perfil</button>

                            </li>

                            <!--   espacio en blanco -->


                            <li class="nav-item" role="presentation">
                                <button class="nav-link bg-light" id="" data-bs-toggle="" data-bs-target=""
                                    type="button" role="tab" aria-controls="" aria-selected="false" disabled></button>

                            </li>

                            <!--   boton de modificar -->


                            <li class="nav-item" role="presentation">
                                <button class="nav-link bg-dark" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact1" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Modificar datos</button>
                            </li>

                            <!--   espacio en blanco -->

                            <li class="nav-item" role="presentation">
                                <button class="nav-link bg-light" id="" data-bs-toggle="" data-bs-target=""
                                    type="button" role="tab" aria-controls="" aria-selected="false" disabled></button>

                            </li>
                            <!--   boton de eliminar -->

                            <li class="nav-item" role="presentation">
                                <button class="nav-link bg-dark" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home1" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="false"> Eliminar cuenta</button>
                            </li>


                        </ul>

                        <div class="tab-content" id="pills-tabContent">


                            <!--   Perfil -->

                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab" tabindex="0">
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

                            <div class="tab-pane fade" id="pills-contact1" role="tabpanel"
                                aria-labelledby="pills-contact-tab" tabindex="0">

                                <div class="col-12">

                                    <div class="col-7">
                                        <div class="form-group row">
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
              echo"      <input type='text' class='form-control' value='' name='contraseña'>";
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
                                                    <input type="submit" value="Actualizar datos de la cuenta"
                                                        name="ActualizarDatos">

                                                </div>
                                            </form>


                                        </div>



                                    </div>
                                </div>

                            </div>

                            <!--  Borrar -->

                            <div class="tab-pane fade " id="pills-home1" role="tabpanel"
                                aria-labelledby="pills-home-tab">

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

                                            <div class="form-group text-center" id="Alert">
                                                <input type="submit" value="Eliminar" name="Eliminar" id="LiveAlert">
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
        obAjax.onreadystatechange = function() {
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

