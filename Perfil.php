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
  <link rel="stylesheet" href="CSS/admin.css">

  <!-- Icon Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"> </script>


    <style> 
  
  </style>
  <title>TITLE</title>


</head>

<body class="body">

  <?php
    include "navbar.php";
    
    ?>

    <br>


  <!-- Formato Perfil -->

  <div class="container">
    <div class="row">
      <div class="col">
        <nav>

          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active bg-dark" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
              type="button" role="tab" aria-controls="nav-home" aria-selected="true">
              <i class="bi bi-person-fill"></i> Perfil
            </button>
            <button class="nav-link bg-dark" id="nav-compras-tab" data-bs-toggle="tab" data-bs-target="#nav-compras"
              type="button" role="tab" aria-controls="nav-compras" aria-selected="true">
              <i class="bi bi-bag-check"></i> Compras
            </button>
            <button class="nav-link bg-dark" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
              type="button" role="tab" aria-controls="nav-profile" aria-selected="true">
              <i class="bi bi-pencil-square"></i> Modificar
            </button>
            <button class="nav-link bg-dark" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
              type="button" role="tab" aria-controls="nav-contact" aria-selected="true">
              <i class="bi bi-x-circle-fill"></i> Eliminar
            </button>
          </div>
        </nav>


        <!-- Perfil -->

        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
            tabindex="0">

            <div class="row">
              <div class="col-5">
                <img class="fotoperfil" src="https://cdn-icons-png.flaticon.com/512/16/16480.png" align="center" >
              </div>
              <div class="col-7">

                
           


            

            <?php
           echo"       <label for='usuario' class='col-4'></label>";
           echo"       <div class='col-8'>";
           echo"         <input type='hidden' class='form-control' value='".$_SESSION['CLIENTE'] -> getIDPersona()."' >";
           echo"      </div>";
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

          
          </div>
        </div>

  

                  <!-- End Perfil -->

        <div class="tab-pane fade" id="nav-compras" role="tabpanel" aria-labelledby="nav-compras-tab" tabindex="0">
        <br>

          <?php

echo "  <div class='row'>";
echo "  <input class='form me-3 barra-busqueda' type='' placeholder='Buscar' aria-label='Search' onkeyup='FiltrarCompra()' id='buscartablacompras' style='width: 40%;'>";

  
include_once 'TablaComprasCliente.php';

echo "  </div>";

?>
            
      

</div>

<!-- Modal Recibo -->
<div class="modal fade" id="recibo1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center" >
        <h5 class="modal-title text-center" id="exampleModalLabel" > Factura </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="reciboPdf">


 



       
      





</div>
      <div class="modal-footer">
        <button type="button" onclick="generarPdf()" class="btn btn-danger">Descargar</button>
      </div>
    </div>
</div>
</div>





        <!-- Modificar Datos -->


          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
          
          <div class="row">

          <div class="col-2">
</div>
<div class="col">
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

  echo"    <label for='codigo' class='col-4'>Actual contrase??a:  </label>";
  echo"    <div class='col-8'>";
  echo"      <input type='password' class='form-control' value='' name='contrase??a'>";
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
              <button class="btn-danger" style=" border-radius: 50px !important; width: 200px;" type="submit" name="ActualizarDatos"> Modificar </button>

            </div>
          </form>
          </div>
          </div>
          </div>

          <br>

            <!-- End Modificar Datos -->
            
                 

            
             <!-- Eliminar cuenta -->

          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
           

          <div class="row">

          <div class="col">

</div>

<div class="col-8">

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

echo"    <label for='codigo' class='col-4'>Contrase??a:  </label>";
echo"    <div class='col-8'>";
echo"      <input type='password' class='form-control' value='' name='Contrase??a'>";
echo"    </div>";


?>

            <br>

            <div class="form-group text-center" id="Alert">
              <button class="btn-danger" type="submit" style=" border-radius: 50px !important; width: 200px;"  name="Eliminar" id="LiveAlert"> Eliminar </button>
        </div>
      </form>
      </div>

      <div class="col">

</div>


</div>


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
    function VerFactura(id){
      var idenvio = id;
      var obAjax = new XMLHttpRequest();
      obAjax.onload = function () {
        document.getElementById('reciboPdf').innerHTML = this.responseText;
        console.log(this.responseText);       
   
      }
      obAjax.open('POST', 'Persistencia/Aumentartabla.php', true);
      obAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      obAjax.send("MostrarFactura="+idenvio);
    }

    function Cerrar() {
      var obAjax = new XMLHttpRequest();
      obAjax.open('POST', 'Persistencia/Control.php', true);
      obAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      obAjax.onreadystatechange = function () {
        window.location.reload();
      }
      obAjax.send('Cerrar');
    }


    function FiltrarCompra() {

variable = new XMLHttpRequest();
  variable.onload = function() {
    document.getElementById("tablacompras").innerHTML = this.responseText;
  }
  variable.open("POST", "TablaComprasCliente.php");
  variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  variable.send("buscar="+document.getElementById("buscartablacompras").value);
}


function generarPdf(){


const element = document.getElementById("reciboPdf");

html2pdf()
.from(element)
.save();
}

  </script>

  <?php
if(isset($_POST['Eliminar'])){
  $p = new Persona();
  $p1 = new PersonaBD();
  $p -> setUsuario($_POST['Usuario']);
  $p -> setContrase??a(md5($_POST['Contrase??a']));
  $p1 -> EliminarCuenta($p);
}


  if(isset($_POST['ActualizarDatos'])){
    $p = new Persona();
    $p1 = new PersonaBD();
    $p -> setIDPersona($_POST['IDPersona']);
    $p -> setUsuario($_POST['usuario']);
    $p -> setContrase??a(md5($_POST['contrase??a']));
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